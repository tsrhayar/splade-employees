<?php

namespace App\Tables;

use App\Models\City;
use App\Models\Country;
use App\Models\Employee;
use App\Models\State;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Collection;

class Employees extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('lastname', 'LIKE', "%{$value}%")
                        ->orWhere('firstname', 'LIKE', "%{$value}%")
                        ->orWhere('middle_name', 'LIKE', "%{$value}%")
                        ->orWhere('adress', 'LIKE', "%{$value}%")
                        ->orWhere('zip_code', 'LIKE', "%{$value}%")
                        ->orWhere('birthdate', 'LIKE', "%{$value}%")
                        ->orWhere('date_hired', 'LIKE', "%{$value}%")
                        ->orWhere('created_at', 'LIKE', "%{$value}%");
                });
            });
        });

        $employees = QueryBuilder::for(Employee::class)
            ->defaultSort('firstname')
            ->allowedSorts([
                'lastname', 'firstname', 'middle_name', 'adress', 'zip_code',
                'city_id', 'state_id', 'country_id', 'birthdate', 'date_hired', 'created_at'
            ])
            ->allowedFilters([
                'lastname', 'firstname', 'middle_name', 'adress', 'zip_code',
                'city_id', 'state_id', 'country_id', 'birthdate', 'date_hired', 'created_at', $globalSearch
            ]);

        return $employees;
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['firstname'])
            ->column('firstname', sortable: true)
            ->column('lastname', sortable: true)
            ->column('middle_name', sortable: true,  hidden: true)
            ->column(key: 'city.name', label: 'Cities')
            ->column(key: 'state.name', label: 'States')
            ->column(key: 'country.name', label: 'Countries')
            ->column('zip_code', sortable: true,  hidden: true)
            ->column('birthdate', sortable: true,  hidden: true)
            ->column('date_hired', sortable: true,  hidden: true)
            ->column('action')
            ->paginate(10)
            ->selectFilter(
                key: 'city_id',
                options: City::pluck('name', 'id')->toArray(),
                label: 'Cities',
                noFilterOption: true,
                noFilterOptionLabel: ' -- '
            )
            ->selectFilter(
                key: 'state_id',
                options: State::pluck('name', 'id')->toArray(),
                label: 'States',
                noFilterOption: true,
                noFilterOptionLabel: ' -- '
            )
            ->selectFilter(
                key: 'country_id',
                options: Country::pluck('name', 'id')->toArray(),
                label: 'Countries',
                noFilterOption: true,
                noFilterOptionLabel: ' -- '
            );

        // ->searchInput()
        // ->selectFilter()
        // ->withGlobalSearch()

        // ->bulkAction()
        // ->export()
    }
}
