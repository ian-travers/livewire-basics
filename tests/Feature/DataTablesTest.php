<?php

namespace Tests\Feature;

use App\Http\Livewire\DataTables;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class DataTablesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function main_page_contains_data_tables_livewire_component()
    {
        $this->get('/')
            ->assertSeeLivewire('data-tables');
    }

    /** @test */
    function datatables_active_checkbox_works_correctly()
    {
        $userA = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userB = User::create([
            'name' => 'Another',
            'email' => 'another@another.com',
            'password' => bcrypt('password'),
            'active' => false,
        ]);

        Livewire::test(DataTables::class)
            ->assertSee($userA->name)
            ->assertDontSee($userB->name)
            ->set('active', false)
            ->assertSee($userB->name)
            ->assertDontSee($userA->name);
    }

    /** @test */
    function datatables_searches_name_correctly()
    {
        $userA = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userB = User::create([
            'name' => 'Another',
            'email' => 'another@another.com',
            'password' => bcrypt('password'),
            'active' => false,
        ]);

        Livewire::test(DataTables::class)
            ->set('search', 'user')
            ->assertSee($userA->name)
            ->assertDontSee($userB->name);
    }

    /** @test */
    function datatables_searches_email_correctly()
    {
        $userA = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userB = User::create([
            'name' => 'Another',
            'email' => 'another@another.com',
            'password' => bcrypt('password'),
            'active' => false,
        ]);

        Livewire::test(DataTables::class)
            ->set('search', 'user@user.com')
            ->assertSee($userA->name)
            ->assertDontSee($userB->name);
    }

    /** @test */
    function datatables_sorts_name_asc_correctly()
    {
        $this->prepareDataToSorting();

        Livewire::test(DataTables::class)
            ->call('sortBy', 'name')
            ->assertSeeInOrder(['Andre A', 'Brian B', 'Cathy C']);
    }

    /** @test */
    function datatables_sorts_name_desc_correctly()
    {
        $this->prepareDataToSorting();

        Livewire::test(DataTables::class)
            ->call('sortBy', 'name')
            ->call('sortBy', 'name')
            ->assertSeeInOrder(['Cathy C', 'Brian B', 'Andre A']);
    }

    /** @test */
    function datatables_sorts_email_asc_correctly()
    {
        $this->prepareDataToSorting();

        Livewire::test(DataTables::class)
            ->call('sortBy', 'email')
            ->assertSeeInOrder(['Andre A', 'Brian B', 'Cathy C']);
    }

    /** @test */
    function datatables_sorts_email_desc_correctly()
    {
        $this->prepareDataToSorting();

        Livewire::test(DataTables::class)
            ->call('sortBy', 'email')
            ->call('sortBy', 'email')
            ->assertSeeInOrder(['Cathy C', 'Brian B', 'Andre A']);
    }

    protected function prepareDataToSorting(): void
    {
        User::create([
            'name' => 'Cathy C',
            'email' => 'cathy@cathy.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        User::create([
            'name' => 'Andre A',
            'email' => 'andre@andre.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        User::create([
            'name' => 'Brian B',
            'email' => 'brian@brian.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);
    }
}
