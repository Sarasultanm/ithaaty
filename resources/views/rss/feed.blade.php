<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0">
    <channel>
        <title><![CDATA[{{$users->name}}]]></title>
        <description><![CDATA[This is a testing podcast for everyone]]></description>
         <link><![CDATA[ https://ithaaty.com/feed/{{$users->alias}} ]]></link>
        <image>
            <url>https://d3t3ozftmdmh3i.cloudfront.net/production/podcast_uploaded/17789837/17789837-1631013743470-36b9d215bea63.jpg</url>
            <title>Ithaaty Sample Podcast</title>
            <link>https://ithaaty.com/feed/{{$users->alias}}</link>
        </image>
        <generator>Ithaaty Podcast</generator>
        <author>
            <name>{{$users->name}}</name>
            <email>{{$users->email}}</email>
        </author>
        <pubDate>{{ now() }}</pubDate>
            
       @foreach($feeds as $feed_item)
            <item>
                <title><![CDATA[{{$feed_item->audio_name}}]]></title>
                <link>Slug here</link>
                <description><![CDATA[{!! $feed_item->audio_summary !!}]]></description>
                <category>{{$feed_item->get_categories->name}}</category>
                <author><![CDATA[{{ $feed_item->get_user->name  }}]]></author>
                <guid>{{ $feed_item->audio_editor  }}</guid>
                <pubDate>{{ $feed_item->created_at  }}</pubDate>
                <enclosure url="{{$amazon_link}}./audio/.{{$feed_item->audio_path}}" type="audio/x-m4a"/>
                <image href="https://d3t3ozftmdmh3i.cloudfront.net/production/podcast_uploaded400/17789837/17789837-1631013740160-890d84d6a811d.jpg"/>
                <season>{{ $feed_item->audio_season  }}</season>
                <episode>{{ $feed_item->audio_episode  }}</episode>
            </item>
        @endforeach
    </channel>
</rss>