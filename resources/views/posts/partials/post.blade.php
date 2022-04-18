{{-- Learned the @include directive
  Created a partials folder within posts. 
  Transferred the loop from the posts.index file into a partial to make for more efficient, cleaner code --}}

@if ($loop->even)
    <div>{{ $key }}.{{ $post['title'] }}</div>
@else
    <div style="background: rgb(245, 170, 164)">{{ $key }}.{{ $post['title'] }}</div>
@endif
