@props(['abilities' => ['post.category.edit', 'post.category.destroy']])
<x-actions.edit :ability="$abilities[0]" :href="route('admin.posts.categories.edit', $category->id)"/>
<x-actions.delete :ability="$abilities[1]" :action="route('admin.posts.categories.destroy', $category->id)"/>
<x-actions.no-actions :ability="$abilities"/>

