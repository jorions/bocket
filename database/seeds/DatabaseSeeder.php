<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Tell the factory method (which by default looks at the "ModelFactory.php" file) to look at the App\User object,
         * and then create 10 versions of it using the parameters defined there
         *
         * --THIS--
         * foreach([1,2,3,4,5,6,7,8,9,10], as $num) {
         *      $faker = new Faker\Generator;
         *      App\User::create([
         *          'url' => "example$num@gmail.com"
         *      ]);
         * }
         *
         * --IS THE SAME AS SAYING THIS--
         * factory(App\User::class, 10)->create();
         */

        $users = factory(App\User::class, 50)->create();

        $users->each(function($user) {

            /* Because of what we defined in the factory, this code will add the 'user_id' to an instance of the Bookmark,
             * and the factory will create the 'url' for the Bookmark
             *
             * --THIS--
             * factory(App\Bookmark::class)->create([
             *   'user_id' => $user->id
             * ]);
             *
             * --IS THE SAME AS SAYING THIS--
             * $user->bookmarks()->save(
             *      factory(App\Bookmark::class)->make()
             * );
             *
             * --IS THE SAME AS SAYING THIS--
             * $bookmark = factory(App\Bookmark::class)->make();
             * $user->bookmarks()->save($bookmark);
             */

            // Create a random number of bookmarks for each user
            foreach (range(1, rand(2, 5)) as $int) {
                $bookmark = factory(App\Bookmark::class)->make();
                // Save the current Bookmark object
                // No () returns a collection like an array, while with () returns the Builder object which explains the
                // the relationship (such as the hasMany relationship), which itself has a save method
                $user->bookmarks()->save($bookmark);
            }

            // Create a random number of tags for each user
            foreach (range(1, rand(2, 5)) as $int) {
                $tag = factory(App\Tag::class)->make();
                $user->tags()->save($tag);
            }

            // Go through the tags for the user and assign it to a random bookmark
            $tags = $user->tags;
            foreach ($tags as $tag) {
                $bookmarks = $user->bookmarks;

                // Pull a random bookmark out of the array of bookmarks
                foreach (range(1, rand(2, 5)) as $int) {
                    $bookmark = $bookmarks[rand(0, $bookmarks->count()-1)];

                    // Stop a tag from being assigned to the same bookmark twice
                    if(!$bookmark->tags()->where('tag_id', $tag->id)->exists()) {
                        $bookmark->tags()->attach($tag);
                    }
                }
            }
        });
    }
}
