# tools-sales-ops
Integrations for our entire sales pipeline

# Basic Structure
* Client
  * Responsible for handling HTTP authorization, requests, and response parsing
* Services
  * Client extensions responsible for handling API-specific requests

---

# Goals
* [x] Create Client Interface & Client Wrapper for GuzzleHttp
* [ ] Map out API Interfaces for:
 * [x] Zoom Accounts
 * [ ] Zoom Webinars
 * [ ] Zoho Accounts
 * [ ] Zoho Contacts
 * [ ] Zoho Leads
 * [ ] Zoho Potentials
 * [ ] Zoho Inventory: Items
 * [ ] Zoho Inventory: Composite Items
 * [ ] Zoho Books: Invoices
 * [ ] Zoho Books: Purchase Orders
 * [ ] Stripe: Payments
 * [ ] Stripe: Subscriptions
* [ ] Create Concrete API Classes for:
 * [x] Zoom Accounts
 * [ ] Zoom Webinars
 * [ ] Zoho Accounts
 * [ ] Zoho Contacts
 * [ ] Zoho Leads
 * [ ] Zoho Potentials
 * [ ] Zoho Inventory: Items
 * [ ] Zoho Inventory: Composite Items
 * [ ] Zoho Books: Invoices
 * [ ] Zoho Books: Purchase Orders
 * [ ] Stripe: Payments
 * [ ] Stripe: Subscriptions

---

# Necessary API integrations
## Zoom
* [Accounts](https://zoom.us/developer/overview/rest-account-api)
* [Webinars](https://zoom.us/developer/overview/rest-webinar-api)

## Zoho
* [CRM](https://www.zoho.com/crm/help/api/api-methods.html)
  * [Leads](https://www.zoho.com/crm/help/api/modules-fields.html#Leads)
  * [Contacts](https://www.zoho.com/crm/help/api/modules-fields.html#Contacts)
  * [Accounts](https://www.zoho.com/crm/help/api/modules-fields.html#Accounts)
  * [Potentials](https://www.zoho.com/crm/help/api/modules-fields.html#Potentials)

* [Inventory](https://www.zoho.com/inventory/api/v1/#introduction)

* Books
  * [Invoices](https://www.zoho.com/books/api/v3/invoices)
  * [Purchase Orders](https://www.zoho.com/books/api/v3/purchaseorders)

## [Stripe](https://stripe.com/docs/api)
We are currently using Ryan's customized Stripe module in our Main Website. We will look at breaking out his module for more generalized use when the time comes.
* General Payments
* Subscriptions
