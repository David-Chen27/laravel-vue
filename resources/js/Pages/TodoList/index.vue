<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Todo List
      </h2>
    </template>

    <div class="flex flex-col md:w-3/5 w-full border-solid rounded-2xl mx-auto shadow-xl m-10 bg-white">
      <div class="mx-auto py-6 text-4xl divide-y-2">
        Todo List
      </div>

      <div class="mx-auto w-full flex flex-row my-2">
        <div class="flex-grow">
          <input type="checkbox" class="mx-3.5"><span class="text-2xl line-through">Laravel</span>
        </div>
        <div class="flex-grow-0 mx-4">
          <button class="h-8 w-16 rounded-xl text-gray-600 text-white text-lg bg-red-400 hover:bg-red-200 shadow-lg">Delete</button>
        </div>
      </div>

      <div class="mx-auto w-full flex flex-row my-2">
        <div class="flex-grow">
          <input type="checkbox" class="mx-3.5"><span class="text-2xl line-through">Laravel</span>
        </div>
        <div class="flex-grow-0 mx-4">
          <button class="h-8 w-16 rounded-xl text-gray-600 text-white text-lg bg-red-400 hover:bg-red-200 shadow-lg">Delete</button>
        </div>
      </div>

      <div class="mx-auto w-full flex flex-row my-2">
        <div class="flex-grow">
          <input type="checkbox" class="mx-3.5"><span class="text-2xl line-through">Laravel</span>
        </div>
        <div class="flex-grow-0 mx-4">
          <button class="h-8 w-16 rounded-xl text-gray-600 text-white text-lg bg-red-400 hover:bg-red-200 shadow-lg">Delete</button>
        </div>
      </div>

      <div class="mx-auto w-full flex flex-row my-2">
        <div class="flex-grow">
          <input type="checkbox" class="mx-3.5"><span class="text-2xl line-through">Laravel</span>
        </div>
        <div class="flex-grow-0 mx-4">
          <button class="h-8 w-16 rounded-xl text-gray-600 text-white text-lg bg-red-400 hover:bg-red-200 shadow-lg">Delete</button>
        </div>
      </div>

      <div class="flex flex-row py-5">
        <input type="text" class="flex-grow w-4/5 rounded-full h-10 ml-6 mr-2 shadow-inner">
        <button class="flex-grow-0 rounded-full h-10 w-20 mx-2 bg-green-500 text-white text-lg hover:bg-green-200 shadow-lg">Add</button>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout"

export default {
  name: "TodoList",
  components: {AppLayout}
}
</script>

<style scoped>

</style>