<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="{{ URL('images/logo-mh.jpg') }}" />
    <title>Mahendra Transport Indonesia</title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    @vite('resources/css/app.css')


</head>

<body class="m-0 font-sans antialiased font-normal text-start text-base leading-default text-slate-500">
    <main class="transition-all duration-200 ease-soft-in-out">
        <section class="bg-white h-screen flex flex-col justify-center w-screen">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
                    <div class="flex-auto p-6 mt-10 bg-white h-screen  rounded-t-2xl border-4">
                        <h5 class="text-center">Isi Data Penumpang</h5>
                        <div class="form-container mt-4  h-full">
                            <!-- Tambahkan kelas form-container di sini -->
                            <form role="form text-left" method="POST"
                                action="{{ route('OrderTicket', ['ID_Jadwal' => $ID_Jadwal, 'Tujuan' => $Tujuan]) }}">
                                @csrf
                                @foreach ($dataseat as $seat)
                                    <div class="mb-4 text-slate-100">
                                        <div class="bg-gradient-to-tl from-gray-900 to-slate-800 p-4 rounded-4">
                                            <input type="hidden" name="seat[]" value="{{ $seat }}">
                                            <p class="mb-[-10px]">No Seat : {{ $seat }}</p>
                                            <label for="Nama_Penumpang" class="pb-2">Nama Penumpang</label>
                                            <input type="text"
                                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-black bg-white bg-clip-padding py-2 px-3 font-normal text-black transition-all focus:border-fuchsia-300 focus:bg-white focus:text-black focus:outline-none focus:transition-shadow"
                                                placeholder="Nama Penumpang" name="Nama_Penumpang[]"
                                                aria-describedby="email-addon" />
                                            <label for="NoHp_Penumpang" class="pb-2 mt-4">No HP</label>
                                            <input type="text"
                                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-black bg-white bg-clip-padding py-2 px-3 font-normal text-black transition-all focus:border-fuchsia-300 focus:bg-white focus:text-black focus:outline-none focus:transition-shadow"
                                                placeholder="No Hp Penumpang" name="No_Penumpang[]"
                                                aria-describedby="email-addon" />
                                        </div>
                                    </div>
                                @endforeach
                                <label for="DP" class="pb-2 mt-4">DP</label>
                                <input type="text"
                                    class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-black bg-white bg-clip-padding py-2 px-3 font-normal text-black transition-all focus:border-fuchsia-300 focus:bg-white focus:text-black focus:outline-none focus:transition-shadow"
                                    placeholder="Jumlah DP" name="DP" aria-describedby="email-addon" />
                                <div class="text-center mb-4">
                                    <button type="submit"
                                        class="inline-block w-full px-6 py-3 mt-4 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 hover:border-slate-700 hover:bg-slate-700 hover:text-white">Order</button>
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
