@props(['abilities' => ['page.edit', 'page.destroy']])
<x-actions.edit :ability="$abilities[0]" :href="route('admin.pages.edit', $page->id)"/>
<x-actions.delete :ability="$abilities[1]" :action="route('admin.pages.destroy', $page->id)"/>
<x-actions.no-actions :ability="$abilities"/>

