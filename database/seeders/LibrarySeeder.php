<?php
namespace Database\Seeders;

use App\Models\Library;
use Illuminate\Database\Seeder;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Library::create([
            'title'       => 'Altorių šešėlyje',
            'author'      => 'Antanas Vienuolis',
            'description' => 'Klebono gyvenimas',
            'year'        => '1926',
            'price'       => '15.29',
        ]);
    }

}
