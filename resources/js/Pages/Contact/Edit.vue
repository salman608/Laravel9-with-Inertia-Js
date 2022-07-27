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
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Contact Information Update</h3>
                                <p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive
                                    mail.</p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form @submit.prevent="submit">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">


                                            <div class="col-span-10 sm:col-span-8">
                                                <label for="name" class="block text-sm font-medium text-gray-700">Name
                                                </label>
                                                <input type="text" v-model="form.name" name="name" id="name"
                                                    autocomplete="name"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                    :class="{ 'border-red-500': form.errors.name }">
                                                <p class="text-pink-600" v-if="form.errors.name">{{ form.errors.name
                                                }}
                                                </p>
                                            </div>

                                            <div class="col-span-10 sm:col-span-8">
                                                <label for="email-address"
                                                    class="block text-sm font-medium text-gray-700">Email
                                                    address</label>
                                                <input type="email" v-model="form.email" name="email-address"
                                                    id="email-address" autocomplete="email"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                    :class="{ 'border-red-500': form.errors.name }">
                                                <p class="text-pink-600" v-if="form.errors.name">{{ form.errors.email }}
                                                </p>
                                            </div>

                                            <div class="col-span-10 sm:col-span-8">
                                                <label for="subject"
                                                    class="block text-sm font-medium text-gray-700">Subject
                                                </label>
                                                <input type="text" v-model="form.subject" name="subject" id="subject"
                                                    autocomplete="subject"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                    :class="{ 'border-red-500': form.errors.name }">
                                                <p class="text-pink-600" v-if="form.errors.name">{{ form.errors.subject
                                                }}
                                                </p>
                                            </div>

                                            <div class="col-span-10 sm:col-span-8">
                                                <label for="message" class="block text-sm font-medium text-gray-700">
                                                    Message
                                                </label>
                                                <div class="mt-1">
                                                    <textarea id="message" v-model="form.message" name="message"
                                                        rows="3"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                                        placeholder="Write Your message"
                                                        :class="{ 'border-red-500': form.errors.name }"></textarea>
                                                    <p class="text-pink-600" v-if="form.errors.name">{{
                                                            form.errors.message
                                                    }}
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                                    </div>
                                </div>
                            </form>
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
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { useForm } from '@inertiajs/inertia-vue3'

export default {
    components: {
        AppLayout,
        AppHead,
        Link,
    },
    props: {
        contactInfo: Object
    },
    setup(props) {
        const form = useForm({
            name: props.contactInfo.name,
            email: props.contactInfo.email,
            subject: props.contactInfo.subject,
            message: props.contactInfo.message,
        });

        function submit() {
            form.put(route('contact.update', props.contactInfo.id))
        }
        return { form, submit };
    }


}
</script>