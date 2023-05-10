@props(['abilities' => ['slider.edit', 'slider.destroy']])
<x-actions.edit :ability="$abilities[0]" :href="route('admin.sliders.edit', $slider->id)"/>
<x-actions.delete :ability="$abilities[1]" :action="route('admin.sliders.destroy', $slider->id)"/>
<x-actions.no-actions :ability="$abilities"/>

