
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Créer un nouveau compte</h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Ou
                    <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500">connectez-vous à votre compte</a>
                </p>
            </div>
            <form class="mt-8 space-y-6" action="{{ url('/register') }}" method="POST">
                @csrf
               
                @if (session('success'))
                    <div class="mb-4 text-green-500">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="rounded-md shadow-sm space-y-4">
                    <div>
                        <label for="nom" class="sr-only">Nom</label>
                        <input id="nom" name="nom" type="text" autocomplete="nom" value="{{ old('nom') }}"   class="appearance-none rounded-lg block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:shadow-outline-blue transition duration-150 ease-in-out sm:text-sm" placeholder="Nom">
                        @error('nom')
                            <span class="text-red-500 pl-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="prenom" class="sr-only">Prénom</label>
                        <input id="prenom" name="prenom" type="text" value="{{ old('prenom') }}"  autocomplete="prenom"  class="appearance-none rounded-lg block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:shadow-outline-blue transition duration-150 ease-in-out sm:text-sm" placeholder="Prénom">
                        @error('prenom')
                            <span class="text-red-500 pl-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="username" class="sr-only">Nom d'utilisateur</label>
                        <input id="username" name="username" type="text"  value="{{ old('username') }}" autocomplete="username"  class="appearance-none rounded-lg block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:shadow-outline-blue transition duration-150 ease-in-out sm:text-sm" placeholder="Nom d'utilisateur">
                        @error('username')
                            <span class="text-red-500 pl-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email"  class="appearance-none rounded-lg block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:shadow-outline-blue transition duration-150 ease-in-out sm:text-sm" placeholder="Email">
                        @error('email')
                            <span class="text-red-500 pl-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="sr-only">Mot de passe</label>
                        <input id="password" name="password" type="password" value="{{ old('password') }}" autocomplete="new-password"  class="appearance-none rounded-lg block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:shadow-outline-blue transition duration-150 ease-in-out sm:text-sm" placeholder="Mot de passe">
                        @error('password')
                            <span class="text-red-500 pl-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="sr-only">Confirmation du mot de passe</label>
                        <input id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" type="password" autocomplete="new-password"  class="appearance-none rounded-lg block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:shadow-outline-blue transition duration-150 ease-in-out sm:text-sm" placeholder="Confirmer le mot de passe">
                        @error('password_confirmation')
                            <span class="text-red-500 pl-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11V7a1 1 0 00-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        Inscription
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
