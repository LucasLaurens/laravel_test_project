<div>
    <form method="POST" action="{{ route('upload.file') }}" enctype="multipart/form-data">
        @csrf

        <input 
            type="text" 
            name="name" 
            id="name">

        <input 
            type="file" 
            name="file" 
            id="file"
            accept="image/png, image/jpeg">
        
        <button type="submit">Créer</button>
    </form>
</div>