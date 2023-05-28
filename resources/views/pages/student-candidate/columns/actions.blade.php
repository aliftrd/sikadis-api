@props(['abilities' => ['student.candidate.edit', 'student.candidate.destroy']])
<form action="{{ route('landing.ppdb.print') }}" method="POST" class="d-inline">
    @csrf
    <input type="hidden" name="nik" value="{{ $studentCandidate->nik }}" readonly>
    <button class="btn btn-info btn-sm" type="submit">
        <i class="fas fa-print"></i>
    </button>
</form>
<x-actions.edit :ability="$abilities[0]" :href="route('admin.student-candidates.edit', $studentCandidate->id)"/>
<x-actions.delete :ability="$abilities[1]" :action="route('admin.student-candidates.destroy', $studentCandidate->id)"/>

