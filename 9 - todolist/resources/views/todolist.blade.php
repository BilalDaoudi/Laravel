<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <div class="text-white font-semibold mb-2 md:mb-0 md:mr-4">Todolist</div>
            <div class="flex items-center">
                <span class="text-white mr-2 md:mr-4">Bonjour, {{ strtoupper(Auth::user()->nom) }} {{ strtoupper(Auth::user()->prenom) }}</span>
                <a href="{{ route('logout') }}" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">Déconnexion</a>
            </div>
        </div>
    </nav>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-semibold">Welcome</h1>

        <div class="mt-4 m-2">
            <label for="date" class="block text-sm font-medium text-gray-700">Choose Date:</label>
            <input type="date" id="date" name="date" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full" value="{{ date('Y-m-d') }}">
        </div>

        <div class="mt-4 m-2">

            <form action="{{ route('add') }}" method="post" class="mt-4 m-2">
                @csrf
                <input type="hidden" id="date_add" name="date_add" class="border border-gray-400 p-2 rounded-md mr-2" value="{{ date('Y-m-d') }}">
                <input type="text" id="description" name="description" class="border border-gray-400 p-2 rounded-md mr-2 w-3/4" placeholder="Enter your todo">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Add Todo</button>
            </form>

        </div>

        <div class="mt-2 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white p-4 rounded-md border border-gray-300 m-2">
                <h2 class="text-lg font-semibold">Todo à saisir</h2>
                <ul class="mt-4">
                    @foreach ($todolists as $todo)
                    @if ($todo->statut == 'saisir')
                    <li class="py-2 flex"><span class="w-3/4">{{ $todo->description }}</span>
                        <div class="flex justify-end">
                            <form action="{{ route('delete',$todo->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button class="text-red-500 mr-2"><i class="fas fa-trash-alt"></i></button>
                            </form>
                            <form action="{{ route('play',$todo->id) }}" method="post">
                                @csrf
                                @method("PUT")
                                <button class="text-green-500">
                                    <i class="fas fa-play"></i>
                                </button>
                            </form>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            <div class="bg-white p-4 rounded-md border border-gray-300 m-2">
                <h2 class="text-lg font-semibold">Todo en cours</h2>
                <ul class="mt-4">
                    @foreach ($todolists as $todo)
                    @if ($todo->statut == 'encours')
                    <li class="py-2 flex"><span class="w-3/4">{{ $todo->description }}</span>
                        <div class="flex justify-end">
                            <form action="{{ route('delete',$todo->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button class="text-red-500 mr-2"><i class="fas fa-trash-alt"></i></button>
                            </form>
                            <form action="{{ route('valider',$todo->id) }}" method="post">
                                @csrf
                                @method("PUT")
                                <button class="text-green-500"><i class="fas fa-check"></i></button>
                            </form>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>

            <div class="bg-white p-4 rounded-md border border-gray-300 m-2">
                <h2 class="text-lg font-semibold">Todo validé</h2>
                <ul class="mt-4">
                    @foreach ($todolists as $todo)
                    @if ($todo->statut == 'valider')
                    <li class="py-2 flex"><span class="w-3/4">{{ $todo->description }}</span>
                        <div class="justify-end">
                            <form action="{{ route('delete',$todo->id) }}" method="post" class="">
                                @csrf
                                @method("DELETE")
                                <button class="text-red-500 mr-2"><i class="fas fa-trash-alt"></i></button>
                            </form>
                            @endif
                            @endforeach
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dateAddInput = document.getElementById('date_add');
            var dateInput = document.getElementById('date');

            dateInput.addEventListener('change', function() {
                dateAddInput.value = dateInput.value;
            });
        });
        var url = window.location.href;
        var dateFromUrl = url.split('/').pop(); 
        if (/^\d{4}-\d{2}-\d{2}$/.test(dateFromUrl)) {
            document.getElementById('date').value = dateFromUrl;
            document.getElementById('date_add').value = dateFromUrl;
        }
        document.getElementById('date').addEventListener('change', function() {
            var selectedDate = this.value;
            var url = '{{ route("todolist", ":date") }}'.replace(':date', selectedDate);
            window.location.href = url;
        });
    </script>
</body>

</html>