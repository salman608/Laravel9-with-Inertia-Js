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
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900"> {{ title }}</h3>
                                <p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive
                                    mail.</p>
                            </div>

                        </div>
                    </div>

                    <div class="flex space-x-2 justify-end">
                        <div>
                            <Link type="button" :href="route('contacts.create')"
                                class="inline-block px-6 py-2.5 bg-blue-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                            Add Contact</Link>

                        </div>
                    </div>
                </div>

                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full border text-center">
                                    <thead class="border-b">
                                        <tr>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                                SL
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                                Name
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                                Email
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                                Subject
                                            </th>

                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                                Message
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                                Time
                                            </th>

                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-b" v-for="contactInfo in contactInfo" :key="contactInfo.id">
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r">
                                                <!-- {{ contactinfo.key + 1 }} -->
                                                {{ contactInfo.id }}
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                                {{ contactInfo.name }}
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                                {{ contactInfo.email }}
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                                {{ contactInfo.subject }}
                                            </td>

                                            <td
                                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                                {{ contactInfo.message }}
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                                {{ contactInfo.created_at }}
                                            </td>

                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <Link :href="`/contacts/${contactInfo.id}/edit`">Edit</Link>|
                                                <button @click="destroy(contactInfo.id)" type="button">Delete</button>


                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </main>
    </app-layout>



</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import AppLayout from '../../Layouts/App'
import AppHead from '../../Layouts/AppHead'
import { Inertia } from '@inertiajs/inertia'


export default {
    components: {
        AppLayout,
        AppHead,
        Link,
    },
    props: {
        contactInfo: Array,
        title: String
    },

    // delete function
    setup() {
        function destroy(id) {

            Inertia.delete(`/contacts/${id}/destroy`, {
                onBefore: () => confirm('Are you sure Delete Contact?'),
                onSuccess: (page) => alert('Contact Deleted Successfully'),
            })
        }
        return {
            destroy
        }
    },

}
</script>