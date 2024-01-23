    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="foto/Logo-login.png" type="image/x-icon">
        <link rel="shortcut icon" href="{{URL('images/logo-mh.jpg')}}" type="image/x-icon">
        @vite('resources/css/app.css')
        <title>Login</title>
    </head>

    <body>
        <div class="flex flex-col w-4/5 h-screen mx-auto">
            <header class=" mx-auto w-full h-1/4 flex">
                <div class="flex items-center">
                    <img src="{{URL('images/logo-mh.jpg')}}" class="w-16 rounded-xl lg:w-20" alt="Logo Mahendra">
                    <div>
                        <h2 class=" pl-5 text-xl font-semibold sm:text-2xl lg:text-4xl text-black font-body">Mahendra Transport Indonesia</h2>
                    </div>
                </div>
            </header>

            <!-- Menu login dan gambar -->
            <main class="flex flex-col-reverse mx-auto w-full h-3/4 gap-4 md:flex-row md:justify-center md:items-center">
                <section class="h-1/2 md:w-1/2 md:h-3/4 md:flex md:flex-col md:justify-center">
                    <div class="flex flex-col px-10 gap-2 ">
                        @if(isset($error))
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 font-body" role="alert">
                                {{ $error }}
                            </div>
                        @endif 
                        <h3 class="text-2xl font-semibold mt-5 lg:text-3xl text-black font-body">Login</h3>
                        <form class="flex flex-col text-base lg:text-lg" method="POST" action="{{URL('login')}}">
                            @csrf
                            <label for="username" class="text-md py-2" >Username</label>
                            <input type="text" id="username" name="username" class="border-2 rounded-lg border-slate-700 pl-2 py-0.5" required>
                            <label for="password" class="text-md py-2">Password</label>
                            <input type="password" class="border-2 rounded-lg border-slate-700 pl-2 py-0.5" id="password"
                            name="password" required>
                            <button class="self-end bg-gold w-20 h-10 mb-5 rounded-lg mt-3" type="submit">Login</button>
                        </form>
                    </div>
                </section>
                <section class="h-1/2 rounded-xl border-2 md:w-1/2 md:h-3/4">
                    <img src="{{URL('images/logo-login.png')}}" alt="" class="w-full h-full rounded-xl">
                </section>
            </main>
        </div>
    </body>

    </html>