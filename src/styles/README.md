# Sistema de Estilos - Solución Factura

Este documento describe el sistema de estilos refactorizado para evitar conflictos entre componentes y mejorar la mantenibilidad.

## 📋 Cambios Principales

### 1. **Sistema de Variables con Namespace**
Las variables CSS ahora usan el prefijo `--app-` para evitar conflictos:

```scss
// ❌ Antes
--primary: #0d1631;
--bg-primary: #0c1221;

// ✅ Ahora
--app-primary: #0d1631;
--app-bg-primary: #0c1221;
```

### 2. **Selectores HTML Específicos**
Los selectores globales ahora requieren clases específicas:

```scss
// ❌ Antes (afectaba TODOS los h1)
h1 { ... }

// ✅ Ahora (solo afecta elementos con clase)
.title-primary,
h1.title-primary { ... }
```

### 3. **Sistema de Botones con Namespace**
Los botones ahora usan clases más específicas:

```scss
// ✅ Nuevo sistema
.app-btn { ... }
.app-btn--primary { ... }
.app-btn--secondary { ... }

// 🔄 Compatibilidad (deprecated)
.btn { @extend .app-btn; }
```

### 4. **Enlaces con Alcance Limitado**
Los estilos de enlaces ya no son completamente globales:

```scss
// ❌ Antes (afectaba TODOS los enlaces)
a { ... }

// ✅ Ahora (solo reset mínimo + clases específicas)
a { color: inherit; }
.nav-link { ... }
.link-primary { ... }
```

### 5. **Contenedores Específicos**
Cada componente tiene su propio contenedor:

```scss
// ✅ Contenedor general
.layout-container { ... }

// ✅ Contenedor específico de navbar
.navbar-container { ... }
```

## 🎯 Guías de Uso

### Variables CSS
```scss
// ✅ Usa las nuevas variables con namespace
color: var(--app-text-primary);
background: var(--app-bg-card);
box-shadow: var(--app-theme-shadow-md);

// 🔄 Las variables sin namespace siguen funcionando pero están deprecated
color: var(--text-primary); // → var(--app-text-primary)
```

### Tipografía
```scss
// ✅ Para títulos principales
<h1 class="title-hero">Hero Title</h1>
<h1 class="title-primary">Primary Title</h1>

// ✅ Para títulos de sección
<h2 class="title-section">Section Title</h2>

// ✅ Para subtítulos
<p class="subtitle">Section description</p>
```

### Botones
```scss
// ✅ Nuevo sistema (recomendado)
<button class="app-btn app-btn--primary">Primary Button</button>
<a class="app-btn app-btn--secondary" href="#">Link Button</a>

// 🔄 Sistema anterior (funciona pero deprecated)
<button class="btn btn-primary">Old Button</button>
```

### Enlaces
```scss
// ✅ Enlaces con clases específicas
<a class="nav-link" href="#">Navigation</a>
<a class="link-primary" href="#">Primary Link</a>
<a class="link-inline" href="#">Inline Link</a>

// ✅ Enlaces sin clase (reset mínimo)
<a href="#">Simple Link</a>
```

### Layout
```scss
// ✅ Contenedores de layout
<div class="layout-container">General Container</div>
<div class="layout-container layout-container--wide">Wide Container</div>
<div class="layout-container layout-container--narrow">Narrow Container</div>

// ✅ Utilidades de layout
<div class="flex items-center justify-between">
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
```

## 🔧 Migración de Componentes

### Paso 1: Actualizar Variables
```scss
// Cambiar en tus archivos SCSS
.my-component {
  // ❌ background: var(--bg-card);
  // ✅ background: var(--app-bg-card);

  // ❌ color: var(--text-primary);
  // ✅ color: var(--app-text-primary);
}
```

### Paso 2: Usar Clases Específicas
```astro
<!-- ❌ Antes -->
<h1>My Title</h1>
<button class="btn">Click me</button>

<!-- ✅ Después -->
<h1 class="title-primary">My Title</h1>
<button class="app-btn app-btn--primary">Click me</button>
```

### Paso 3: Encapsular Estilos
```scss
// ✅ Usar nombres específicos para evitar conflictos
.my-component {
  // Estilos específicos del componente

  &__title {
    // En lugar de usar h1 global
  }

  &__button {
    // En lugar de usar .btn global
  }
}
```

## 🚨 Problemas Resueltos

### 1. **Conflicto de Contenedores**
- **Problema**: `.container` redefinido en navbar con `!important`
- **Solución**: Creado `.navbar-container` específico

### 2. **Selectores HTML Globales**
- **Problema**: `h1`, `h2`, etc. afectaban todos los elementos
- **Solución**: Selectores requieren clases específicas

### 3. **Variables CSS Conflictivas**
- **Problema**: Variables genéricas podían ser sobrescritas
- **Solución**: Namespace `--app-` + variables de compatibilidad

### 4. **Enlaces Globales**
- **Problema**: Selector `a` muy amplio
- **Solución**: Reset mínimo + clases específicas

### 5. **Especificidad Problemática**
- **Problema**: Uso excesivo de `!important`
- **Solución**: Especificidad natural + selectores específicos

## 📝 Convenciones

### Nomenclatura BEM
```scss
.component { }
.component__element { }
.component--modifier { }
.component__element--modifier { }
```

### Variables CSS
```scss
--app-[categoria]-[propiedad]: valor;
--app-color-primary: #0d1631;
--app-spacing-md: 1rem;
--app-shadow-lg: 0 10px 15px rgba(0,0,0,0.1);
```

### Clases Utilitarias
```scss
.flex { display: flex; }
.items-center { align-items: center; }
.gap-4 { gap: 1rem; }
.hide-mobile { @media (max-width: 767px) { display: none; } }
```

## 🔄 Compatibilidad

El sistema mantiene compatibilidad hacia atrás:
- Variables sin namespace siguen funcionando
- Clases `.btn` siguen funcionando (pero están deprecated)
- Se puede migrar gradualmente componente por componente

## 📚 Archivos del Sistema

```
src/styles/
├── README.md              # Este documento
├── variables.scss          # Variables CSS con namespace
├── global.scss            # Reset y utilidades globales
├── typography.scss        # Sistema de tipografía
├── buttons.scss           # Sistema de botones
├── links.scss             # Sistema de enlaces
└── mediaQueries.scss      # Mixins responsive
```

## 🎨 Próximos Pasos

1. **Migrar componentes gradualmente** al nuevo sistema
2. **Eliminar variables deprecated** en la próxima versión mayor
3. **Implementar CSS Modules** para mayor encapsulación
4. **Crear design tokens** más robustos
5. **Añadir linting CSS** para mantener convenciones
