<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="{{URL('images/logo-mh.jpg')}}"" />
    <title>Mahendra Transport Indonesia</title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    @vite('resources/css/app.css')

  </head>

  <body class="m-0 font-sans antialiased font-normal  text-start text-base leading-default text-slate-500] ">
    <main class=" transition-all duration-200 ease-soft-in-out">
      <section class="bg-gradient-to-tl from-gray-900 to-slate-800 h-screen flex flex-col justify-center w-screen overflow-hidden" >
          <div class="flex flex-wrap -mx-3 -mt-48 md:-mt-56 lg:-mt-48">
            <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
              <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-2 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
                  <h5 class="mt-6">Ubah Password</h5>
                </div>
                <div class="flex-auto p-6">
                  @if(isset($error))
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 font-body" role="alert">
                        {{ $error }}
                    </div>
                  @endif 
                  <form role="form text-left" method="POST">
                    @csrf
                    <div class="mb-4">
                      <input type="password" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-black bg-white bg-clip-padding py-2 px-3 font-normal text-black transition-all focus:border-fuchsia-300 focus:bg-white focus:text-black  focus:outline-none focus:transition-shadow" placeholder="Password Lama" name="oldPassword" aria-describedby="email-addon" />
                    </div>
                    <div class="mb-4"   >
                      <input type="password" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-black bg-white bg-clip-padding py-2 px-3 font-normal text-black transition-all focus:border-fuchsia-300 focus:bg-white focus:text-black  focus:outline-none focus:transition-shadow" placeholder="Password Baru" name="newPassword" aria-describedby="email-addon" />
                    </div>
                    <div class="mb-4">
                      <input type="password" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-black bg-white bg-clip-padding py-2 px-3 font-normal text-black transition-all focus:border-fuchsia-300 focus:bg-white focus:text-black focus:outline-none focus:transition-shadow" placeholder="Ulangi Password Baru" name="repeatPassword" aria-describedby="password-addon" />
                    </div>
                    <div class="text-center">
                      <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 hover:border-slate-700 hover:bg-slate-700 hover:text-white">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </section>
    </main>
  </body>
</html>

