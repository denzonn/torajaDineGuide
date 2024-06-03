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
        <div class="absolute top-1/2 left-1/3 -translate-y-1/2 -translate-x-1/2 text-secondary font-bold w-[23%] pb-10">
            <div class="font-semibold text-4xl text-center">Login</div>
            <div class="mt-6">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-lg font-bold mb-2">
                            Email
                        </label>
                        <input id="email" type="email"
                            class="bg-transparent border rounded-md w-full px-4 py-2 text-sm font-medium @error('email') is-invalid @enderror"
                            placeholder="Email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback font-medium text-red-500 mb-4" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block text-lg font-bold mb-2">
                            Password
                        </label>
                        <input id="password" type="password"
                            class="bg-transparent border rounded-md w-full px-4 py-2 text-sm font-medium @error('password') is-invalid @enderror"
                            placeholder="Password" name="password">
                        @error('password')
                            <span class="invalid-feedback font-medium text-red-500  mb-4" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <button type="submit"
                            class="bg-secondary text-white px-4 py-2 w-full rounded-lg font-medium">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    @include('includes.script')
</body>

</html>
