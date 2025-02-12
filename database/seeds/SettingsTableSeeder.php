<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert(
          [
              [
                  'settings_description' => 'Title',
                  'settings_key' => 'title',
                  'settings_value' => 'MRS Title',
                  'settings_type' => 'text',
                  'settings_must' => 0,
                  'settings_delete' => '0',
                  'settings_status' => '1'
              ],
              [
                  'settings_description' => 'Description',
                  'settings_key' => 'description',
                  'settings_value' => 'MRS Description',
                  'settings_type' => 'text',
                  'settings_must' => 1,
                  'settings_delete' => '0',
                  'settings_status' => '1'
              ],
              [
                  'settings_description' => 'Logo',
                  'settings_key' => 'logo',
                  'settings_value' => 'logo.png',
                  'settings_type' => 'file',
                  'settings_must' => 2,
                  'settings_delete' => '0',
                  'settings_status' => '1'
              ],
              [
                  'settings_description' => 'Icon',
                  'settings_key' => 'icon',
                  'settings_value' => 'icon.ico',
                  'settings_type' => 'file',
                  'settings_must' => 3,
                  'settings_delete' => '0',
                  'settings_status' => '1'
              ],
              [
                  'settings_description' => 'Key Words',
                  'settings_key' => 'keywords',
                  'settings_value' => 'movie,recommendation,system',
                  'settings_type' => 'text',
                  'settings_must' => 4,
                  'settings_delete' => '0',
                  'settings_status' => '1'
              ],
              [
                  'settings_description' => 'Phone',
                  'settings_key' => 'phone_sabit',
                  'settings_value' => '0850 XXX XX XX',
                  'settings_type' => 'text',
                  'settings_must' => 5,
                  'settings_delete' => '0',
                  'settings_status' => '1'
              ],
              [
                  'settings_description' => 'Phone GSM',
                  'settings_key' => 'phone_gsm',
                  'settings_value' => '053X XXX XX XX',
                  'settings_type' => 'text',
                  'settings_must' => 6,
                  'settings_delete' => '0',
                  'settings_status' => '1'
              ],
              [
                  'settings_description' => 'Mail',
                  'settings_key' => 'mail',
                  'settings_value' => 'info@mrs.com',
                  'settings_type' => 'text',
                  'settings_must' => 7,
                  'settings_delete' => '0',
                  'settings_status' => '1'
              ],
              [
                  'settings_description' => 'District',
                  'settings_key' => 'district',
                  'settings_value' => 'Bakırköy',
                  'settings_type' => 'text',
                  'settings_must' => 8,
                  'settings_delete' => '0',
                  'settings_status' => '1'
              ],
              [
                  'settings_description' => 'Province',
                  'settings_key' => 'province',
                  'settings_value' => 'info@mrs.com',
                  'settings_type' => 'text',
                  'settings_must' => 9,
                  'settings_delete' => '0',
                  'settings_status' => '1'
              ],
              [
                  'settings_description' => 'Address',
                  'settings_key' => 'address',
                  'settings_value' => 'Bakırköy Florya',
                  'settings_type' => 'text',
                  'settings_must' => 10,
                  'settings_delete' => '0',
                  'settings_status' => '1'
              ]
          ]
        );
    }
}
