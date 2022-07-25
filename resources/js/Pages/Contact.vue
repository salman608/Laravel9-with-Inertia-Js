<template>
    <AppHead title="Contact"></AppHead>
    <app-layout>
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-900"> Contact</h1>
            </div>
        </header>
        <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Replace with your content -->
                <div class="px-4 py-6 sm:px-0">
                    <div class="border-4 border-dashed border-gray-200 rounded-lg h-96"></div>
                </div>
                <!-- /End replace -->
            </div>
        </main>
    </app-layout>



</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import AppLayout from '../Layouts/App'
import AppHead from '../Layouts/AppHead'

export default {
    components: {
        AppLayout,
        AppHead,
        Link,
    }
}
</script>