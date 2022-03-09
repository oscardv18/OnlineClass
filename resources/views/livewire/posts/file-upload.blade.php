<div>
    <form wire:submit.prevent="uploadFile">
        <label class="border-2 border-gray-200 p-3 w-full block rounded cursor-pointer my-2" for="{{ $identificator }}"
            x-data="{ files: null }">
            <input type="file" class="sr-only" name="files[]" id="{{ $identificator }}" wire:model="files" multiple="true"
                x-on:change="files = Object.values($event.target.files)">
            <span x-text="files ? files.map(file => file.name).join(', ') : 'Subir Archivos del Examen...'"></span>
        </label>
        @error('files')
            <span class="error">{{ $message }}</span>
        @enderror
        <button type="submit" class="btn bg-gradient-warning">Subir</button>
    </form>
</div>
