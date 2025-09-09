<template>
  <div class="flex flex-col min-h-screen overflow-hidden px-24 py-12">
    <div class="navbar bg-base-300 shadow-sm">
      <a class="btn btn-ghost text-xl" href="/">Courses</a>
    </div>

    <main class="flex flex-col grow-1 bg-base-200 p-4 mt-8">
      <router-view />
    </main>
  </div>
</template>
