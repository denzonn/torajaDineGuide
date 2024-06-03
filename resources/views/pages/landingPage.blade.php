<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @include('includes.style')
</head>

<body>
    <div class="backgroundImage">
        <div class="absolute top-1/2 left-1/3 -translate-y-1/2 -translate-x-1/2 text-secondary font-bold">
            <div class="flex flex-col items-center justify-center">
                <p class="text-[110px] leading-none tracking-wide">Toraja</p>
                <p class="text-5xl text-white bg-secondary p-2 rounded-md tracking-widest mt-2">Dine Guide</p>
            </div>
        </div>
        <div class="absolute bottom-7 right-10">
            <a href="/login" class="mt-6 text-2xl flex flex-row gap-2 items-center text-white bg-secondary px-4 py-2 rounded-md">Login <i class="fa-solid fa-right-long"></i></a>
        </div>
    </div>

    @include('includes.script')
</body>

</html>
