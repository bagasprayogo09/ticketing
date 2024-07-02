<!-- resources/views/ID/ticket_close.blade.php -->
<x-ID-layout>
    <div class="container mx-auto px-4 py-8">
        <h2 class="font-semibold text-xl text-center text-blue-600 dark:text-blue-400 leading-tight">
            {{ __('Close Ticket') }}
        </h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ID.ticket_close.close', $ticket->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-8">
                <label for="catatan">Catatan Perbaikan :</label>
                <textarea class="form-control" id="catatan" name="catatan" rows="4" placeholder="Enter your repair notes here"></textarea>
            </div>
            <div class="form-group">
                <label for="photo">Upload Photo</label>
                <input type="file" class="form-control" id="photo" name="photo" required>
            </div>
            <button type="submit" class="btn btn-primary mt-4" id="close-ticket-btn">Close Ticket</button>
        </form>
    </div>
</x-ID-layout>

<!-- Add the following CSS in your Blade template -->
<style>
    #close-ticket-btn {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    #close-ticket-btn:hover {
        background-color: #0056b3;
    }

    #close-ticket-btn:active {
        background-color: #004494;
    }
</style>
