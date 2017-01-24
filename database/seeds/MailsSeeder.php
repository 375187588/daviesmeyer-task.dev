<?php

use Illuminate\Database\Seeder;

class MailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('mails')->truncate();

        for ($x = 1; $x < 6; $x++) {
            DB::table('mails')->insert([
                'name' => 'name ' . $x,
                'email' => 'mail' . $x . '@mail.com',
                'phone' => rand(111111, 999999),
                'address' => 'user' . $x . '@user.com',
                'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam a iaculis urna. Nullam porttitor urna ligula. Sed blandit mauris libero, sit amet finibus est porta ac. Etiam non semper magna, ac posuere neque. Cras ornare dictum lorem ac iaculis. Fusce in arcu volutpat justo hendrerit imperdiet. Etiam nisl tellus, commodo eu dui sed, gravida pretium nisi. Maecenas dignissim risus in consectetur sagittis.

                                Maecenas nunc ante, tincidunt at lobortis ac, volutpat et enim. Morbi elit odio, sollicitudin hendrerit ornare vel, luctus id ex. Vivamus commodo rhoncus orci eu dignissim. Phasellus ornare dapibus ligula quis fermentum. Cras congue imperdiet dolor, ut suscipit ligula faucibus non. Sed mollis pellentesque nulla, vitae iaculis sapien blandit quis. Donec blandit mauris eros, eu bibendum ipsum tincidunt nec. Aliquam semper, nisl et congue vulputate, lacus purus auctor ex, sed tempor lorem justo nec mi.
                                
                                Fusce molestie interdum metus eu dictum. Etiam interdum blandit eros, id vestibulum est ullamcorper vitae. Sed pellentesque enim ut lacus auctor elementum. Sed eleifend ante at ultricies vulputate. Integer enim enim, mattis et faucibus non, dapibus at odio. Curabitur malesuada sem nisl, sit amet accumsan elit fermentum non. Proin ut libero ex. Quisque maximus, purus ut sodales interdum, turpis dolor commodo ex, ut ornare mauris ligula ut tortor. Pellentesque tincidunt enim nec nibh bibendum volutpat. Quisque pulvinar lacinia diam, sodales consectetur arcu finibus eget.
                                
                                Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus non metus odio. Suspendisse eu lacus lacus. Proin interdum ut nunc eu mollis. Aliquam ac pellentesque ipsum. Donec bibendum fermentum posuere. Nunc eu rutrum nisl, ac porta mauris. Nullam ornare, tortor volutpat gravida lacinia, metus magna sodales ligula, a mattis justo dolor non elit. Mauris aliquet lectus nulla, a blandit nibh sagittis in. Curabitur nulla nisl, vestibulum finibus varius tincidunt, tempus a lectus.
                                
                                Aliquam venenatis id risus non dignissim. Donec posuere elementum nisi sed ultricies. Sed luctus in mi at suscipit. Sed lacinia rutrum pulvinar. Curabitur eu sagittis tellus. Phasellus nulla sapien, sollicitudin ac augue ac, viverra ultrices ex. Ut id lobortis libero.',
            ]);
        }
    }
}
