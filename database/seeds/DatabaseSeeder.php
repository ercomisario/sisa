<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StateTableSeeder::class);
        $this->call(MunicipalityTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(ParishTableSeeder::class);
        $this->call(SectorTableSeeder::class);
        $this->call(LocationTableSeeder::class);
        $this->call(MedicalCentersTableSeeder::class);
        $this->call(BloodTypesTableSeeder::class);
        $this->call(PersonTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ShiftsTableSeeder::class);
        $this->call(SpecialitiesTableSeeder::class);
        $this->call(DeseaseClasificationsTableSeeder::class);
        $this->call(DoctorsTableSeeder::class);
        $this->call(NursesTableSeeder::class);
        $this->call(SecretariesTableSeeder::class);
        $this->call(AttentionTypesTableSeeder::class);
        $this->call(MedicalConsutationsTableSeeder::class);
        $this->call(MedicalReportsTableSeeder::class);
        $this->call(AdmissionsTableSeeder::class);
        $this->call(MedicalRecordsTableSeeder::class);
        $this->call(ClinicalCasesTableSeeder::class);
        $this->call(AnalysisTypeTableSeeder::class);
        $this->call(AnalysisGroupTableSeeder::class);
        $this->call(ItemGroupTableSeeder::class);
        $this->call(ImportantItemGroupTableSeeder::class);
        $this->call(AnamnesisRecordsTableSeeder::class);
        $this->call(AnamnesisObservationsTableSeeder::class);
        $this->call(ImportantAnamnesisObservationsTableSeeder::class);
        $this->call(PresentationsTableSeeder::class);
        $this->call(MedicalOrdersTableSeeder::class);
        $this->call(MedicalJustificationsTableSeeder::class);
        $this->call(VitalSignsTableSeeder::class);
        $this->call(MedicalEvolutionsTableSeeder::class);
        $this->call(NurseReportsTableSeeder::class);
    }
}
