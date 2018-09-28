<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CrawlerDantri extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler:dantri';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'lay du lieu dantri';
    protected $categories = [
        [
            'slug' => 'xa-hoi.htm',
            'name' => 'Xã hội'
        ],
        [
            'slug' => 'the-gioi.htm',
            'name' => 'Thế giới'
        ],
        [
            'slug' => 'tam-long-nhan-ai.htm',
            'name' => 'Tấm lòng nhân ái'
        ]
    ];

    
    public function crawlerCategory($categories){
        foreach ($categories as $category) {
            $cate = \App\Category::where('slug',$category['slug'])->first();
            if($cate == null){
                $cate = \App\Category::create([
                    'name' => $category['name'],
                    'slug' => $category['slug'],
                ]);
            }
            $crawlerCategory = \Goutte::request('GET', 'https://dantri.com.vn/' . $category['slug']);

            $links = $crawlerCategory->filter('div.fl.wid470 a.fon6')->each(function ($node) {
              return $node->attr('href');
          });

            foreach($links as $link){
                self::crawlerPost($link, $cate);
                
            }
        }
    }
    

    public function crawlerPost($link,$cate){
        $newPost = new \App\Post();
        

        $crawler = \Goutte::request('GET', 'https://dantri.com.vn' . $link);

        $title = $crawler->filter('#ctl00_IDContent_ctl00_divContent .mgb15')->each(function ($node) {
          return $node->text();
      });
        if(count($title) > 0){
            $title = $title[0];
        }else{
            $title = "";
        }
        

        $content = $crawler->filter('#ctl00_IDContent_ctl00_divContent #divNewsContent ')->each(function ($node) {
          return $node->text();
      });
        if(count($content) >0){
            $content = $content[0];
        }else{
            $content = "";
        }
        $description = $crawler->filter('#ctl00_IDContent_ctl00_divContent h2.sapo')->each(function ($node) {
          return $node->text();
      });
        if(count($description) >0){
            $description = $description[0];
        }else{
            $description = "";
        }
        $thumbnail = $crawler->filter('#ctl00_IDContent_ctl00_divContent .VCSortableInPreviewMode img')->each(function ($node) {
          return $node->attr('src');
      });
        if(count($thumbnail) >0){
            $thumbnail = $thumbnail[0];
        }else{
            $thumbnail = "";
        }

        

        $newPost->title = $title;
        $newPost->description = $description;
        $newPost->content = $content;
        $newPost->user_id = 1;
        $newPost->category_id = $cate->id;
        $newPost->slug = str_slug($title.time());
        $newPost->thumbnail = $thumbnail;
        $newPost->viewPost = 0;
        $newPost->save();

        $tagNames = $crawler->filter('#ctl00_IDContent_ctl00_divContent span.news-tags-item a')->each(function ($node) {
          return $node->text();
      });
        

        foreach($tagNames as $tagName){
            $tag = \App\Tag::where('name',$tagName)->first();
            if($tag == null){
                $tag = \App\Tag::create([
                    'name' => $tagName,
                    'slug' => str_slug($tagName.time()),
                ]);
            }
            $newPostTag = new \App\PostTag();
            $newPostTag->tag_id = $tag->id;
            $newPostTag->post_id = $newPost->id;
            $newPostTag->save();
        }

        

    }

    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        self::crawlerCategory($this->categories);
        echo "done";
    }
}
