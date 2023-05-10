@props(['abilities' => ['post.edit', 'post.destroy']])
<x-actions.edit :ability="$abilities[0]" :href="route('admin.posts.edit', $post->id)"/>
<x-actions.delete :ability="$abilities[1]" :action="route('admin.posts.destroy', $post->id)"/>
<x-actions.no-actions :ability="$abilities"/>
