@props(['abilities' => ['academic.year.edit', 'academic.year.destroy']])

@if(!$academicYear->status)
    <x-actions.active :ability="$abilities[0]" :action="route('admin.academic-years.status', $academicYear->id)"
                      active-icon="fa fa-check" default-icon="fa fa-times" :active="$academicYear->status"
                      :disabled="false"/>
@endif
@if($academicYear->status)
    <x-actions.active :ability="$abilities[0]" :action="route('admin.academic-years.ppdb', $academicYear->id)"
                      active-icon="fa fa-user-check" default-icon="fa fa-user-times" :active="$academicYear->ppdb"
                      :disabled="false"/>
@endif
<x-actions.edit :ability="$abilities[0]" :href="route('admin.academic-years.edit', $academicYear->id)"/>
<x-actions.delete :ability="$abilities[1]" :action="route('admin.academic-years.destroy', $academicYear->id)"/>
<x-actions.no-actions :ability="$abilities"/>
