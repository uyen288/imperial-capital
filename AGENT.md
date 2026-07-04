# Imperial Capital - Laravel Backend Specification

## Project Overview

Build the backend for the Imperial Capital website using Laravel 12.

The frontend UI is already completed.

The backend should provide:

- Fund management
- Performance management
- Portfolio management
- Document management
- Authentication (Admin only)
- Public website

---

# Tech Stack

- Laravel 12
- PHP 8.3+
- MySQL
- Blade
- TailwindCSS
- Eloquent ORM

---

# Authentication

Only admin can login.

Authentication includes:

- Login
- Logout

No registration.

Use Laravel Authentication.

---

# Database

## funds

Columns

- id
- name
- slug
- short_description
- description
- strategy
- objective
- nav
- ytd_return
- five_year_return
- inception_date
- latest_report
- created_at
- updated_at

---

## performances

Belongs to Fund

Columns

- id
- fund_id
- date
- nav
- one_month
- three_month
- one_year
- three_year
- ytd
- created_at
- updated_at

---

## portfolios

Belongs to Fund

Columns

- id
- fund_id
- company_name
- ticker
- sector
- weight
- asset_type
- created_at
- updated_at

---

## documents

Belongs to Fund

Columns

- id
- fund_id
- title
- category
- file
- publish_date
- created_at
- updated_at

Category:

- Factsheet
- Monthly Report
- Prospectus
- Charter

---

# Models

Create:

- Fund
- Performance
- Portfolio
- Document

Relationships

Fund

- hasMany Performance
- hasMany Portfolio
- hasMany Document

Performance

- belongsTo Fund

Portfolio

- belongsTo Fund

Document

- belongsTo Fund

---

# Public Pages

## Home

Display all funds.

---

## Fund Detail

Route

```
/funds/{slug}
```

Sections

- Overview
- Performance
- Portfolio
- Documents

The navigation tabs should scroll to sections.

---

# Admin

Dashboard

CRUD

- Funds
- Performances
- Portfolios
- Documents

Use Resource Controllers.

---

# Routes

Public

```
/
```

```
/funds
```

```
/funds/{slug}
```

Authentication

```
/login
/logout
```

Admin

```
/admin/dashboard
```

```
/admin/funds/*
```

```
/admin/performances/*
```

```
/admin/portfolios/*
```

```
/admin/documents/*
```

Protect all admin routes using auth middleware.

---

# Validation

Validate every request using Form Request.

Example

Fund

- name required
- slug unique
- nav numeric
- inception_date date

Document

- PDF only
- Maximum 20MB

---

# File Storage

Store uploaded PDFs using Laravel Storage.

Directory

```
storage/app/public/documents
```

Use

```
php artisan storage:link
```

---

# Coding Standards

- Use Eloquent Relationships
- Use Route Model Binding
- Use Form Requests
- Use Service Layer when business logic grows
- Keep controllers thin
- No duplicated code

---

# Deliverables

Implement

- migrations
- models
- relationships
- controllers
- requests
- routes
- authentication
- CRUD
- blade integration

The backend should work directly with the existing frontend.
