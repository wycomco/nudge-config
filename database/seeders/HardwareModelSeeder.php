<?php

namespace Database\Seeders;

use App\Models\HardwareModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HardwareModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $major_versions = [
            '11' => null,
            '12' => null,
            '13' => null,
            '14' => null,
            '15' => null,
        ];

        function get_major_id($version)
        {
            return DB::table('major_operating_systems')->where('version', $version)->value('id');
        }

        array_walk($major_versions, function (&$value, $key) {
            $value = get_major_id($key);
        });

        HardwareModel::upsert([
            ['name' => 'iMac (21.5-inch, Mid 2014)', 'model_identifier' => '["iMac14,4"]', 'board_identifier' => '["Mac-81E3E92DD6088272"]', 'max_major_operating_system' => $major_versions['11']],
            ['name' => 'iMac (Retina 5K, 27-inch, Late 2014)', 'model_identifier' => '["iMac15,1"]', 'board_identifier' => '["Mac-42FD25EABCABB274"]', 'max_major_operating_system' => $major_versions['11']],
            ['name' => 'iMac (Retina 5K, 27-inch, Mid 2015)', 'model_identifier' => '["iMac15,1"]', 'board_identifier' => '["Mac-42FD25EABCABB274"]', 'max_major_operating_system' => $major_versions['11']],
            ['name' => 'iMac (21.5-inch, Late 2015)', 'model_identifier' => '["iMac16,1", "iMac16,2"]', 'board_identifier' => '["Mac-A369DDC4E67F1C45", " Mac-FFE5EF870D7BA81A"]', 'max_major_operating_system' => $major_versions['12']],
            ['name' => 'iMac (Retina 4K, 21.5-inch, Late 2015)', 'model_identifier' => '["iMac16,2"]', 'board_identifier' => '["Mac-FFE5EF870D7BA81A"]', 'max_major_operating_system' => $major_versions['12']],
            ['name' => 'iMac (Retina 5K, 27-inch, Late 2015)', 'model_identifier' => '["iMac17,1"]', 'board_identifier' => '["Mac-B809C3757DA9BB8D", "Mac-DB15BD556843C820", "Mac-65CE76090165799A"]', 'max_major_operating_system' => $major_versions['12']],
            ['name' => 'iMac (21.5-inch, 2017)', 'model_identifier' => '["iMac18,1"]', 'board_identifier' => '["Mac-4B682C642B45593E"]', 'max_major_operating_system' => $major_versions['13']],
            ['name' => 'iMac (Retina 4K, 21.5-inch, 2017)', 'model_identifier' => '["iMac18,2"]', 'board_identifier' => '["Mac-BE088AF8C5EB4FA2"]', 'max_major_operating_system' => $major_versions['13']],
            ['name' => 'iMac (Retina 5K, 27-inch, 2017)', 'model_identifier' => '["iMac18,3"]', 'board_identifier' => '["Mac-BE088AF8C5EB4FA2"]', 'max_major_operating_system' => $major_versions['13']],
            ['name' => 'iMac Pro (2017)', 'model_identifier' => '["iMacPro1,1"]', 'board_identifier' => '["Mac-7BA5B2D9E42DDD94"]', 'max_major_operating_system' => $major_versions['15']],
            ['name' => 'iMac (Retina 4K, 21.5-inch, 2019)', 'model_identifier' => '["iMac19,2"]', 'board_identifier' => '["Mac-63001698E7A34814"]', 'max_major_operating_system' => $major_versions['15']],
            ['name' => 'iMac (Retina 5K, 27-inch, 2019)', 'model_identifier' => '["iMac19,1"]', 'board_identifier' => '["Mac-AA95B1DDAB278B95"]', 'max_major_operating_system' => $major_versions['15']],
            ['name' => 'iMac (Retina 5K, 27-inch, 2020)', 'model_identifier' => '["iMac20,1", "iMac20,2"]', 'board_identifier' => '["Mac-CFF7D910A743CAAF", "Mac-AF89B6D9451A490B"]', 'max_major_operating_system' => NULL],
            ['name' => 'iMac (24-inch, M1, 2021)', 'model_identifier' => '["iMac21,1", "iMac21,2"]', 'board_identifier' => '["J456AP", "J457AP"]', 'max_major_operating_system' => NULL],
            ['name' => 'iMac (24-inch, 2023)', 'model_identifier' => '["Mac15,4", "Mac15,5"]', 'board_identifier' => '["J433AP", "J434AP"]', 'max_major_operating_system' => NULL],
            ['name' => 'iMac (24-inch, 2024)', 'model_identifier' => '["Mac16,2", "Mac16,3"]', 'board_identifier' => '["J623AP", "J624AP"]', 'max_major_operating_system' => NULL],
            ['name' => 'MacBook (Retina, 12-inch, Early 2015)', 'model_identifier' => '["MacBook8,1"]', 'board_identifier' => '["Mac-BE0E8AC46FE800CC"]', 'max_major_operating_system' => $major_versions['11']],
            ['name' => 'MacBook (Retina, 12-inch, Early 2016)', 'model_identifier' => '["MacBook9,1"]', 'board_identifier' => '["Mac-9AE82516C7C6B903"]', 'max_major_operating_system' => $major_versions['12']],
            ['name' => 'MacBook (Retina, 12-inch, 2017)', 'model_identifier' => '["MacBook10,1"]', 'board_identifier' => '["Mac-EE2EBD4B90B839A8"]', 'max_major_operating_system' => $major_versions['13']],
            ['name' => 'MacBook Air (11-inch, Mid 2012)', 'model_identifier' => '["MacBookAir5,1"]', 'board_identifier' => '["Mac-66F35F19FE2A0D05"]', 'max_major_operating_system' => $major_versions['11']],
            ['name' => 'MacBook Air (13-inch, Mid 2012)', 'model_identifier' => '["MacBookAir5,2"]', 'board_identifier' => '["Mac-2E6FAB96566FE58C"]', 'max_major_operating_system' => $major_versions['11']],
            ['name' => 'MacBook Air (11-inch, Mid 2013)', 'model_identifier' => '["MacBookAir6,1"]', 'board_identifier' => '["Mac-35C1E88140C3E6CF"]', 'max_major_operating_system' => $major_versions['11']],
            ['name' => 'MacBook Air (13-inch, Mid 2013)', 'model_identifier' => '["MacBookAir6,2"]', 'board_identifier' => '["Mac-7DF21CB3ED6977E5"]', 'max_major_operating_system' => $major_versions['11']],
            ['name' => 'MacBook Air (11-inch, Early 2014)', 'model_identifier' => '["MacBookAir6,1"]', 'board_identifier' => '["Mac-35C1E88140C3E6CF"]', 'max_major_operating_system' => $major_versions['11']],
            ['name' => 'MacBook Air (13-inch, Early 2014)', 'model_identifier' => '["MacBookAir6,2"]', 'board_identifier' => '["Mac-7DF21CB3ED6977E5"]', 'max_major_operating_system' => $major_versions['11']],
            ['name' => 'MacBook Air (11-inch, Early 2015)', 'model_identifier' => '["MacBookAir7,1"]', 'board_identifier' => '["Mac-9F18E312C5C2BF0B"]', 'max_major_operating_system' => $major_versions['12']],
            ['name' => 'MacBook Air (13-inch, Early 2015)', 'model_identifier' => '["MacBookAir7,2"]', 'board_identifier' => '["Mac-937CB26E2E02BB01"]', 'max_major_operating_system' => $major_versions['12']],
            ['name' => 'MacBook Air (13-inch, 2017)', 'model_identifier' => '["MacBookAir7,2"]', 'board_identifier' => '["Mac-937CB26E2E02BB01"]', 'max_major_operating_system' => $major_versions['12']],
            ['name' => 'MacBook Air (Retina, 13-inch, 2018)', 'model_identifier' => '["MacBookAir8,1"]', 'board_identifier' => '["Mac-827FAC58A8FDFA22"]', 'max_major_operating_system' => $major_versions['14']],
            ['name' => 'MacBook Air (Retina, 13-inch, 2019)', 'model_identifier' => '["MacBookAir8,2"]', 'board_identifier' => '["Mac-226CB3C6A851A671"]', 'max_major_operating_system' => $major_versions['14']],
            ['name' => 'MacBook Air (Retina, 13-inch, 2020)', 'model_identifier' => '["MacBookAir9,1"]', 'board_identifier' => '["Mac-0CFF9C7C2B63DF8D"]', 'max_major_operating_system' => $major_versions['15']],
            ['name' => 'MacBook Air (M1, 2020)', 'model_identifier' => '["MacBookAir10,1"]', 'board_identifier' => '["J313AP"]', 'max_major_operating_system' => NULL],
            ['name' => 'MacBook Air (M2, 2022)', 'model_identifier' => '["Mac14,2"]', 'board_identifier' => '["J413AP"]', 'max_major_operating_system' => NULL],
            ['name' => 'MacBook Air (15-inch, M2, 2023)', 'model_identifier' => '["Mac14,5", "Mac14,15"]', 'board_identifier' => '["J414cAP", "J415AP"]', 'max_major_operating_system' => NULL],
            ['name' => 'MacBook Air (13-inch, M3, 2024)', 'model_identifier' => '["Mac15,12"]', 'board_identifier' => '["J613AP"]', 'max_major_operating_system' => NULL],
            ['name' => 'MacBook Air (15-inch, M3, 2024)', 'model_identifier' => '["Mac15,13"]', 'board_identifier' => '["J615AP"]', 'max_major_operating_system' => NULL],
            ['name' => 'MacBook Air (13-inch, M4, 2025)', 'model_identifier' => '["Mac16,12"]', 'board_identifier' => '["J713AP"]', 'max_major_operating_system' => NULL],
            ['name' => 'MacBook Air (15-inch, M4, 2025)', 'model_identifier' => '["Mac16,13"]', 'board_identifier' => '["J715AP"]', 'max_major_operating_system' => NULL],
            ['name' => 'MacBook Pro (Retina, 13-inch, Late 2013)', 'model_identifier' => '["MacBookPro11,1"]', 'board_identifier' => '["Mac-189A3D4F975D5FFC"]', 'max_major_operating_system' => $major_versions['11']],
            ['name' => 'MacBook Pro (Retina, 15-inch, Late 2013)', 'model_identifier' => '["MacBookPro11,2", "MacBookPro11,3"]', 'board_identifier' => '["Mac-3CBD00234E554E41"]', 'max_major_operating_system' => $major_versions['11']],
            ['name' => 'MacBook Pro (Retina, 13-inch, Mid 2014)', 'model_identifier' => '["MacBookPro11,1"]', 'board_identifier' => '["Mac-189A3D4F975D5FFC"]', 'max_major_operating_system' => $major_versions['11']],
            ['name' => 'MacBook Pro (Retina, 15-inch, Mid 2014)', 'model_identifier' => '["MacBookPro11,2", "MacBookPro11,3"]', 'board_identifier' => '["Mac-2BD1B31983FE1663"]', 'max_major_operating_system' => $major_versions['11']],
            ['name' => 'MacBook Pro (Retina, 13-inch, Early 2015)', 'model_identifier' => '["MacBookPro12,1"]', 'board_identifier' => '["Mac-E43C1C25D4880AD6"]', 'max_major_operating_system' => $major_versions['12']],
            ['name' => 'MacBook Pro (Retina, 15-inch, Mid 2015)', 'model_identifier' => '["MacBookPro11,4", "MacBookPro11,5"]', 'board_identifier' => '["Mac-06F11F11946D27C5", "Mac-06F11FD93F0323C5"]', 'max_major_operating_system' => $major_versions['12']],
            ['name' => 'MacBook Pro (13-inch, 2016, Two Thunderbolt 3 ports)', 'model_identifier' => '["MacBookPro13,1"]', 'board_identifier' => '["Mac-473D31EABEB93F9B"]', 'max_major_operating_system' => $major_versions['12']],
            ['name' => 'MacBook Pro (13-inch, 2016, Four Thunderbolt 3 ports)', 'model_identifier' => '["MacBookPro13,2"]', 'board_identifier' => '["Mac-66E35819EE2D0D05"]', 'max_major_operating_system' => $major_versions['12']],
            ['name' => 'MacBook Pro (15-inch, 2016)', 'model_identifier' => '["MacBookPro13,3"]', 'board_identifier' => '["Mac-A5C67F76ED83108C"]', 'max_major_operating_system' => $major_versions['12']],
            ['name' => 'MacBook Pro (13-inch, 2017, Two Thunderbolt 3 ports)', 'model_identifier' => '["MacBookPro14,1"]', 'board_identifier' => '["Mac-B4831CEBD52A0C4C"]', 'max_major_operating_system' => $major_versions['13']],
            ['name' => 'MacBook Pro (13-inch, 2017, Four Thunderbolt 3 ports)', 'model_identifier' => '["MacBookPro14,2"]', 'board_identifier' => '["Mac-CAD6701F7CEA0921"]', 'max_major_operating_system' => $major_versions['13']],
            ['name' => 'MacBook Pro (15-inch, 2017)', 'model_identifier' => '["MacBookPro14,3"]', 'board_identifier' => '["Mac-551B86E5744E2388"]', 'max_major_operating_system' => $major_versions['13']],
            ['name' => 'MacBook Pro (13-inch, 2018, Four Thunderbolt 3 ports)', 'model_identifier' => '["MacBookPro15,2"]', 'board_identifier' => '["Mac-827FB448E656EC26"]', 'max_major_operating_system' => $major_versions['15']],
            ['name' => 'MacBook Pro (15-inch, 2018)', 'model_identifier' => '["MacBookPro15,1"]', 'board_identifier' => '["Mac-937A206F2EE63C01"]', 'max_major_operating_system' => $major_versions['15']],
            ['name' => 'MacBook Pro (13-inch, 2019, Two Thunderbolt 3 ports)', 'model_identifier' => '["MacBookPro15,4"]', 'board_identifier' => '["Mac-53FDB3D8DB8CA971"]', 'max_major_operating_system' => $major_versions['15']],
            ['name' => 'MacBook Pro (13-inch, 2019, Four Thunderbolt 3 ports)', 'model_identifier' => '["MacBookPro15,2"]', 'board_identifier' => '["Mac-827FB448E656EC26"]', 'max_major_operating_system' => $major_versions['15']],
            ['name' => 'MacBook Pro (15-inch, 2019)', 'model_identifier' => '["MacBookPro15,1", "MacBookPro15,3"]', 'board_identifier' => '["Mac-937A206F2EE63C01", "Mac-1E7E29AD0135F9BC"]', 'max_major_operating_system' => $major_versions['15']],
            ['name' => 'MacBook Pro (16-inch, 2019)', 'model_identifier' => '["MacBookPro16,1", "MacBookPro16,4"]', 'board_identifier' => '["Mac-E1008331FDC96864", " Mac-A61BADE1FDAD7B05"]', 'max_major_operating_system' => NULL],
            ['name' => 'MacBook Pro (13-inch, 2020, Two Thunderbolt 3 ports)', 'model_identifier' => '["MacBookPro16,3"]', 'board_identifier' => '["Mac-5F9802EFE386AA28"]', 'max_major_operating_system' => $major_versions['15']],
            ['name' => 'MacBook Pro (13-inch, 2020, Four Thunderbolt 3 ports)', 'model_identifier' => '["MacBookPro16,2"]', 'board_identifier' => '["Mac-E7203C0F68AA0004"]', 'max_major_operating_system' => NULL],
            ['name' => 'MacBook Pro (13-inch, M1, 2020)', 'model_identifier' => '["MacBookPro17,1"]', 'board_identifier' => '["J293AP"]', 'max_major_operating_system' => NULL],
            ['name' => 'MacBook Pro (14-inch, 2021)', 'model_identifier' => '["MacBookPro18,3", "MacBookPro18,4"]', 'board_identifier' => '["J314sAP", "J314cAP"]', 'max_major_operating_system' => NULL],
            ['name' => 'MacBook Pro (16-inch, 2021)', 'model_identifier' => '["MacBookPro18,1", "MacBookPro18,2"]', 'board_identifier' => '["J316sAP", "J316cAP"]', 'max_major_operating_system' => NULL],
            ['name' => 'MacBook Pro (13-inch, M2, 2022)', 'model_identifier' => '["Mac14,7"]', 'board_identifier' => '["J493AP"]', 'max_major_operating_system' => NULL],
            ['name' => 'MacBook Pro (14-inch, 2023)', 'model_identifier' => '["Mac14,5", "Mac14,9"]', 'board_identifier' => '["J414cAP", "J414sAP"]', 'max_major_operating_system' => NULL],
            ['name' => 'MacBook Pro (16-inch, 2023)', 'model_identifier' => '["Mac14,6", "Mac14,10"]', 'board_identifier' => '["J416cAP", "J416sAP"]', 'max_major_operating_system' => NULL],
            ['name' => 'MacBook Pro (14-inch, Nov 2023)', 'model_identifier' => '["Mac15,3", "Mac15,6", "Mac15,8", "Mac15,10"]', 'board_identifier' => '["J504AP", "J514sAP", "J514cAP", "J514mAP"]', 'max_major_operating_system' => NULL],
            ['name' => 'MacBook Pro (16-inch, Nov 2023)', 'model_identifier' => '["Mac15,7", "Mac15,9", "Mac15,11"]', 'board_identifier' => '["J516sAP", "J516cAP", "J516mAP"]', 'max_major_operating_system' => NULL],
            ['name' => 'MacBook Pro (14-inch, Nov 2024)', 'model_identifier' => '["Mac16,1", "Mac16,6", "Mac16,8"]', 'board_identifier' => '["J604AP", "J614cAP", "J614sAP"]', 'max_major_operating_system' => NULL],
            ['name' => 'MacBook Pro (16-inch, Nov 2024)', 'model_identifier' => '["Mac16,5", "Mac16,7"]', 'board_identifier' => '["J616cAP", "J616sAP"]', 'max_major_operating_system' => NULL],
            ['name' => 'Mac mini (Late 2014)', 'model_identifier' => '["Macmini7,1"]', 'board_identifier' => '["Mac-35C5E08120C7EEAF"]', 'max_major_operating_system' => $major_versions['12']],
            ['name' => 'Mac mini (Late 2018)', 'model_identifier' => '["Macmini8,1"]', 'board_identifier' => '["Mac-7BA5B2DFE22DDD8C"]', 'max_major_operating_system' => $major_versions['15']],
            ['name' => 'Mac mini (M1, 2020)', 'model_identifier' => '["Macmini9,1"]', 'board_identifier' => '["J274AP"]', 'max_major_operating_system' => NULL],
            ['name' => 'Mac mini (2023)', 'model_identifier' => '["Mac14,3", "Mac14,12"]', 'board_identifier' => '["J473AP", "J474sAP"]', 'max_major_operating_system' => NULL],
            ['name' => 'Mac mini (2024)', 'model_identifier' => '["Mac16,10", "Mac16,11"]', 'board_identifier' => '["J773gAP", "J773sAP"]', 'max_major_operating_system' => NULL],
            ['name' => 'Mac Pro (Late 2013)', 'model_identifier' => '["MacPro6,1"]', 'board_identifier' => '["Mac-F60DEB81FF30ACF6"]', 'max_major_operating_system' => $major_versions['12']],
            ['name' => 'Mac Pro (2019)', 'model_identifier' => '["MacPro7,1"]', 'board_identifier' => '["Mac-27AD2F918AE68F61"]', 'max_major_operating_system' => NULL],
            ['name' => 'Mac Pro (Rack 2019)', 'model_identifier' => '["MacPro7,1"]', 'board_identifier' => '["Mac-27AD2F918AE68F61"]', 'max_major_operating_system' => NULL],
            ['name' => 'Mac Pro (2023)', 'model_identifier' => '["Mac14,8"]', 'board_identifier' => '["J180dAP"]', 'max_major_operating_system' => NULL],
            ['name' => 'Mac Studio (2022)', 'model_identifier' => '["Mac13,1", "Mac13,2"]', 'board_identifier' => '["J375cAP", "J375dAP"]', 'max_major_operating_system' => NULL],
            ['name' => 'Mac Studio (2023)', 'model_identifier' => '["Mac14,13", "Mac14,14"]', 'board_identifier' => '["J475cAP", "J475dAP"]', 'max_major_operating_system' => NULL],
            ['name' => 'Mac Studio (2025)', 'model_identifier' => '["Mac15,14", "Mac16,9"]', 'board_identifier' => '["J575cAP", "J575dAP"]', 'max_major_operating_system' => NULL],
        ], ['name'], ['model_identifier', 'board_identifier', 'max_major_operating_system']);
    }
}
