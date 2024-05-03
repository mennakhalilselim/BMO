<x-public-layout doctitle="403">
    <div>   
        <h1 class="text-8xl font-extrabold px-8">
            403
        </h1>

        <p class="text-xl px-8">
            This action is unauthorized
        </p>

        <div class="mt-6">
            <a class="focus:outline focus:outline-2 focus:rounded-sm focus:outline-bmo" href="{{ url()->previous() }}">                        
                <span class="text-bmo font-extrabold">< </span>
                Go Back
            </a>
        </div>
        
    </div>
    
    <div class="ml-4">
        <x-notfound-logo />
    </div>
</x-public-layout>