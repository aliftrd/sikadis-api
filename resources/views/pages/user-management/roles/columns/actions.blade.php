@props(['abilities' => ['role.edit', 'role.destroy']])
<x-actions.edit :ability="$abilities[0]" :href="route('admin.roles.edit', $role->id)"/>
<x-actions.delete :ability="$abilities[1]" :action="route('admin.roles.destroy', $role->id)"/>
<x-actions.no-actions :ability="$abilities"/>

