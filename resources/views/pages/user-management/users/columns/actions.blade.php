@props(['abilities' => ['user.edit', 'user.destroy']])
<x-actions.edit :ability="$abilities[0]" :href="route('admin.users.edit', $user->id)"/>
<x-actions.delete :ability="$abilities[1]" :action="route('admin.users.destroy', $user->id)"/>
<x-actions.no-actions :ability="$abilities"/>

