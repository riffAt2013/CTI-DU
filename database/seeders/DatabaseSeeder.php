<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();


        DB::table('users')->insert([
            'name' => 'admin',
            'email' =>'admin'.'@gmail.com',
            'password' =>Hash::make('password'),
            'email_verified_at' => now(),
            'created_at'=>	now(),
            'updated_at'=>now(),
        ]);

        DB::table('abouts')->insert([
            'description' => '<p class="MsoNormal" style="text-align:justify"><span class="fontstyle01"><b><span style="font-size:12.0pt;line-height:
107%;font-family:&quot;Times New Roman&quot;,serif">About CTI<o:p></o:p></span></b></span></p>

<p class="MsoNormal" style="text-align:justify"><span class="fontstyle01"><span style="font-size:12.0pt;line-height:107%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin">The Center for Trade and Investment (CTI) is a
multidisciplinary non-profit research</span></span><span style="font-size:12.0pt;
line-height:107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;
color:black"><br>
</span><span class="fontstyle01"><span style="font-size:12.0pt;line-height:107%;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin">and development
arm of the University of Dhaka that began its journey in November</span></span><span style="font-size:12.0pt;line-height:107%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin;color:black"><br>
</span><span class="fontstyle01"><span style="font-size:12.0pt;line-height:107%;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin">2013. Some
members of the Faculty of Business Studies comprise the current core</span></span><span style="font-size:12.0pt;line-height:107%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin;color:black"><br>
</span><span class="fontstyle01"><span style="font-size:12.0pt;line-height:107%;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin">staff of the
Center. The Center is also capable of enhancing its resources by</span></span><span style="font-size:12.0pt;line-height:107%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin;color:black"><br>
</span><span class="fontstyle01"><span style="font-size:12.0pt;line-height:107%;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin">developing
linkages with various other centers, departments and institutes of the</span></span><span style="font-size:12.0pt;line-height:107%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin;color:black"><br>
</span><span class="fontstyle01"><span style="font-size:12.0pt;line-height:107%;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin">university, as
well as outside organizations. It is also in a position to draw upon the</span></span><span style="font-size:12.0pt;line-height:107%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin;color:black"><br>
</span><span class="fontstyle01"><span style="font-size:12.0pt;line-height:107%;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin">diversified
intellectual input of over two hundred faculty members of the Faculty of</span></span><span style="font-size:12.0pt;line-height:107%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin;color:black"><br>
</span><span class="fontstyle01"><span style="font-size:12.0pt;line-height:107%;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin">Business Studies
of the university.</span></span></p><p class="MsoNormal" style="text-align:justify"><span class="fontstyle01"><span style="font-size:12.0pt;line-height:107%;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin">In addition to
trade and investment issues, CTI is currently also focusing on sectoral</span></span><span style="font-size:12.0pt;line-height:107%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin;color:black"><br>
</span><span class="fontstyle01"><span style="font-size:12.0pt;line-height:107%;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin">and skills
development research and training.</span></span></p><p class="MsoNormal" style="text-align:justify"><span class="fontstyle01"><span style="font-size:12.0pt;line-height:107%;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin">CTI conducts
needs assessment studies, skill-gap analyses, etc. and works with</span></span><span style="font-size:12.0pt;line-height:107%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin;color:black"><br>
</span><span class="fontstyle01"><span style="font-size:12.0pt;line-height:107%;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin">various
government agencies, development partners, international certification</span></span><span style="font-size:12.0pt;line-height:107%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin;color:black"><br>
</span><span class="fontstyle01"><span style="font-size:12.0pt;line-height:107%;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin">bodies, and
chambers of commerce and sector associations to promote skill</span></span><span style="font-size:12.0pt;line-height:107%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin;color:black"><br>
</span><span class="fontstyle01"><span style="font-size:12.0pt;line-height:107%;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin">upgrading of
human resources.&nbsp;</span></span><span style="font-size: 12pt;">CTI is also
involved in promoting academia-industry collaboration for mutually&nbsp;</span><span style="font-size: 12pt;">beneficial
results.</span></p><p class="MsoNormal" style="text-align:justify"><span class="fontstyle01"><span style="font-size:12.0pt;line-height:107%;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin">Current
collaboration partners on skill development issues include International</span></span><span style="font-size:12.0pt;line-height:107%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin;color:black"><br>
</span><span class="fontstyle01"><span style="font-size:12.0pt;line-height:107%;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin">Labour
Organization (ILO), National Skills Development Council (NSDC) Secretariat,</span></span><span style="font-size:12.0pt;line-height:107%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin;color:black"><br>
</span><span class="fontstyle01"><span style="font-size:12.0pt;line-height:107%;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin">Australian Trade
Commission, State Electricity Company, Dhaka Metropolitan Police, Rapid Action
Battalion, Ministry of Labor and Employment and Ministry of Information
Technology.<o:p></o:p></span></span></p>',
            'created_at'=>	now(),
            'updated_at'=> now(),
            'video'=> 'https://www.youtube.com/watch?v=T7BMndEDYLc',
        ]);

        DB::table('missions')->insert([
            'title' => 'title',
            'description' => 'description description description description',
            'image' => 'default.png' ,
            'created_at'=>	now(),
            'updated_at'=>now(),
        ]);
        DB::table('visions')->insert([
            'title' => 'title',
            'description' => 'description description description description',
            'image' => 'default.png' ,
            'created_at'=>	now(),
            'updated_at'=>now(),
        ]);
        DB::table('plans')->insert([
            'title' => 'title',
            'description' => 'description description description description',
            'image' => 'default.png' ,
            'created_at'=>	now(),
            'updated_at'=>now(),
        ]);
        DB::table('galleries')->insert([
            'category' => 'category 1',
            'image' => 'default.png' ,
            'created_at'=>	now(),
            'updated_at'=>now(),
        ]);
        DB::table('heroes')->insert([
            'image' => 'default.png' ,
            'created_at'=>	now(),
            'updated_at'=>now(),
        ]);
        DB::table('services')->insert([
            'title' => 'title',
            'description' => 'description description description description',
            'image' => 'default.png',
            'created_at'=>	now(),
            'updated_at'=>now(),
        ]);

        DB::table('organizations')->insert([
            'title' => 'title',
            'description' => 'description description description description',
            'image' => 'default.png',
            'created_at'=>	now(),
            'updated_at'=>now(),
        ]);

        DB::table('completed_research')->insert([
            'title' => 'title',
            'description' => 'description description description description',
            'created_at'=>	now(),
            'updated_at'=>now(),
        ]);
        DB::table('ongoing_research')->insert([
            'title' => 'title',
            'description' => 'description description description description',
            'created_at'=>	now(),
            'updated_at'=>now(),
        ]);

        DB::table('trainings')->insert([
            'title' => 'title',
            'description' => 'description description description description',
            'image' => 'default.png',
            'created_at'=>	now(),
            'updated_at'=>now(),
        ]);
        DB::table('fellowships')->insert([
            'title' => 'title',
            'description' => 'description description description description',
            'image' => 'default.png',
            'created_at'=>	now(),
            'updated_at'=>now(),
        ]);
        DB::table('higher_education')->insert([
            'title' => 'title',
            'description' => 'description description description description',
            'image' => 'default.png',
            'created_at'=>	now(),
            'updated_at'=>now(),
        ]);
        DB::table('internships')->insert([
            'title' => 'title',
            'description' => 'description description description description',
            'image' => 'default.png',
            'created_at'=>	now(),
            'updated_at'=>now(),
        ]);
        DB::table('publications')->insert([
            'title' => 'title',
            'description' => 'description description description description',
            'created_at'=>	now(),
            'updated_at'=>now(),
        ]);
        DB::table('expertises')->insert([
            'title' => 'title',
            'description' => 'description description description description',
            'image' => 'default.png',
            'created_at'=>	now(),
            'updated_at'=>now(),
        ]);
        DB::table('members')->insert([
            'name' => 'name1',
            'designation' => 'designation',
            'message' => 'message',
            'image' => 'default.png',
            'created_at'=>	now(),
            'updated_at'=>now(),
        ]);
        DB::table('contacts')->insert([
            'name' => 'title',
            'email' => 'description description description description',
            'phone' => 'description description description description',
            'address' => 'description description description description',
            'message' => 'description description description description',
            'created_at'=>	now(),
            'updated_at'=>now(),
        ]);

    }
}
