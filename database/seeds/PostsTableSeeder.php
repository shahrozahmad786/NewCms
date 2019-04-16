<?php


use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
     $category1=Category::create([

     'name'=>'News'


     ]);


        $category2=Category::create([

     'name'=>'Marketing'


     ]);


        $category3=Category::create([

     'name'=>'Partnership'


     ]);

        




     $tag1=Tag::create([

     'name'=>'job'


     ]);
     



     $tag2=Tag::create([

     'name'=>'customers'


     ]);


      $tag3=Tag::create([

     'name'=>'record'


     ]);

     $author1=User::create([

         'name'=>'John Doe',
         'email'=>'john@doe.com',
         'password'=>Hash::make('123456')


        ]);

        $author2=User::create([

         'name'=>'John Cina',
         'email'=>'john@cina.com',
         'password'=>Hash::make('123456')


        ]);




    $post1=Post::create([

    'title'=>'We relocated our office to a new designed garage',
    'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500',

    'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
    'image'=>'posts/6.jpg',

    'category_id'=>$category1->id,
    'user_id'=>$author1->id,




    ]);



        $post2=$author2->posts()->create([

        'title'=>'We relocated our office to a new designed garage',
        'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500',

        'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
        'image'=>'posts/11.jpg',

        'category_id'=>$category2->id,



        ]);

        $post3=$author1->posts()->create([

        'title'=>'We relocated our office to a new designed garage',
        'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500',

        'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
        'image'=>'posts/17.jpg',

        'category_id'=>$category3->id,


        ]);

        
        $post4=$author2->posts()->create([

        'title'=>'We relocated our office to a new designed garage',
        'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500',

        'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
        'image'=>'posts/3.jpg',

        'category_id'=>$category1->id,


        ]);

           //Now attaching tags with posts


          $post1->tags()->attach([$tag1->id,$tag2->id]);
          $post2->tags()->attach([$tag2->id]);
          $post3->tags()->attach([$tag2->id,$tag3->id]);
          $post3->tags()->attach([$tag3->id,$tag1->id]);







    }
}
