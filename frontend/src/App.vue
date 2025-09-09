<template>
  <div class="flex flex-col min-h-screen overflow-hidden px-32 py-12">
    <div class="navbar bg-base-300 shadow-sm">
      <a class="btn btn-ghost text-xl" href="/">Cursos: potencia tu carrera</a>
    </div>

    <main class="flex flex-col grow-1 bg-base-200 p-8 mt-8">
      <router-view />
    </main>
  </div>
</template>
