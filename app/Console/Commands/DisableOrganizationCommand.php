<?php
//
//namespace App\Console\Commands;
//
//use Illuminate\Console\Command;
//use Illuminate\Support\Carbon;
//use Modules\EMap\Entities\Organization;
//
//class DisableOrganizationCommand extends Command
//{
//    /**
//     * The name and signature of the console command.
//     *
//     * @var string
//     */
//    protected $signature = 'organization:disable';
//
//    /**
//     * The console command description.
//     *
//     * @var string
//     */
//    protected $description = 'Organization is disable';
//
//    /**
//     * Execute the console command.
//     *
//     * @return int
//     */
//    public function handle()
//    {
//        $processedOrganizations = [];
//
//        $organizations = Organization::where('can_work', false)->get();
//        $currentDate = Carbon::now();
//
//        foreach ($organizations as $organization) {
//            if (in_array($organization->id, $processedOrganizations)) {
//                $this->info("Organization '{$organization->name}' has already been processed.");
//                continue;
//            }
//
//            if (!$organization->can_work && $currentDate->month == 2 && $currentDate->day == 2) {
//                $organization->update(['status' => 'inactive']);
//                $this->info("Organization '{$organization->name}' has been disabled on January 31.");
//                $processedOrganizations[] = $organization->id;
//            } else {
//                $this->info("Organization '{$organization->name}' can still work.");
//            }
//        }
//
//
//        return 0;
//    }
//}
