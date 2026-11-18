@props(['course'])
<x-form-input name="name" label="Course Name" :value="$course->name" />
<x-form-textarea name="description" label="Description" :value="$course->description" />
<x-form-input name="duration" label="Duration (weeks)" type="number" min="1" :value="$course->duration" />
<x-form-input name="fee" label="Fee" type="number" min="0" step="0.01" :value="$course->fee" />
<div class="form-group">
    <label for="difficulty">Difficulty</label>
    <select id="difficulty" name="difficulty" required>
        @foreach (['Easy', 'Medium', 'Hard'] as $difficulty)
            <option value="{{ $difficulty }}" @selected(old('difficulty', $course->difficulty) === $difficulty)>
                {{ $difficulty }}
            </option>
        @endforeach
    </select>
    @error('difficulty')
        <p class="error">{{ $message }}</p>
    @enderror
</div>
<div class="form-group checkbox-group">
    <input type="hidden" name="is_active" value="0">
    <input type="checkbox" id="is_active" name="is_active" value="1"
           @checked(old('is_active', $course->is_active ? '1' : '0') == '1')>
    <label for="is_active">Active</label>
    @error('is_active')
        <p class="error">{{ $message }}</p>
    @enderror
</div>
