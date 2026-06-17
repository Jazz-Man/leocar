Webhooks Guide

> ## Documentation Index
> Fetch the complete documentation index at: https://roapp.readme.io/llms.txt
> Use this file to discover all available pages before exploring further.

# Webhooks Guide

Webhooks allow your systems to receive real-time updates when specific events occur in RO App. These updates are sent as HTTP POST requests to your designated endpoint. With our Webhooks API, you can automate workflows, integrate with third-party applications, and respond dynamically to events in our system.

## How It Works

1. Event Occurs: A predefined event is triggered in our system (e.g., order creation, status update).
2. Webhook Payload Sent: Our system sends an HTTP POST request to your endpoint with event details in JSON format.
3. Process the Payload: Your system processes the data for further actions or integrations.

## Registering a Webhook

<Image align="center" className="border" border={true} src="https://files.readme.io/92cce48c0378f5b6dfae99e7f1617b9a1943ba0acc5962b546584761a5d99888-image.png" />

To start using webhooks, follow these steps:

**Step1: Navigate to the Webhooks Settings Page**

* Log in to your account.
* Go to "[Settings > API](https://web.roapp.io/settings/api)" section.

**Step 2: Create a Webhook**

* Click on "+ Webhook".
* Enter the following details:
  * Endpoint URL (the URL where event data will be sent)
  * Description
  * Events to Subscribe (select the events you wish to receive updates for).

**Step 3: Save the Webhook**

* Click Save to register your webhook.

> Note: Ensure your endpoint is accessible and uses HTTPS for secure data transfer.

## Supported Events

Below are the events you can subscribe to.

### Tasks

`Task.Created` — Triggered when a new task is created.\
`Task.Completed` — Triggered when a task is marked as completed.\
`Task.Reopened` — Triggered when a task is reopened.\
`Task.Deadline.Changed` — Triggered when a task's deadline date is changed.\
`Task.Assignee.Changed` — Triggered when a task's assignee is created.\
`Task.Deleted` — Triggered when a task is deleted.

### Leads

`Lead.Created` — Triggered when a new lead is created.\
`Lead.Status.Changed` — Triggered when a lead's status is changed.\
`Lead.Client.Changed` — Triggered when a lead's client is changed.\
`Lead.Type.Changed` — Triggered when a lead's type is changed.\
`Lead.Deadline.Changed` — Triggered when a lead's deadline date is changed.\
`Lead.Location.Changed` — Triggered when a lead's location is changed.\
`Lead.Manager.Changed` — Triggered when a lead's manager is changed.\
`Lead.Deleted` — Triggered when a lead is deleted.

### Estimates and Orders (Tickets, Jobs, ...)

`Order.Created` — Triggered when a new order is created.\
`Order.Type.Changed` — Triggered when an order's type is updated.\
`Order.Status.Changed` — Triggered when an order's status is changed.\
`Order.Client.Changed` — Triggered when the client associated with an order is updated.\
`Order.Manager.Changed` — Triggered when an order's manager is updated.\
`Order.Assignee.Changed` — Triggered when an order's engineer is updated.\
`Order.Deadline.Changed` — Triggered when an order's deadline is updated.\
`Order.Amount.Changed` — Triggered when an order's total amount is changed.\
`Order.Location.Changed` — Triggered when an order is moved to another location.\
`Order.Approval.Accepted` — Triggered when an estimate or order is accepted by the client.\
`Order.Approval.Declined` — Triggered when an estimate or order is declined by the client.\
`Order.Deleted ` — Triggered when an order is deleted.

### Clients

`Client.Created` — Triggered when a new client is created.\
`Client.Deleted` — Triggered when a client is deleted.\
`CustomerFeedback.Created` — Triggered when a new feedback review from a client is created.

### Invoices

`Invoice.Created` — Triggered when a new invoice is created.\
`Invoice.Deleted` — Triggered when an invoice is deleted.

### Other events

`Comment.Created` — Triggered when a new comment is created.\
`Attachment.Created` — Triggered when a new file or image is attached to an object (task, lead, order etc.).\
`Auth.Login` — Triggered when an employee logs into their account.

## Webhook Payload

When an event is triggered, we send a JSON payload to your endpoint. Below is a sample payload structure:

```Text json
{
  "id": "9cba80cc-93b5-459b-bfd3-445e724dafc5",
  "created_at": "2024-12-05T11:31:39.440424Z",
  "created_at_ts": 1733398299.440424,
  "event_name": "Order.Status.Changed",
  "context": {
    "object_id": 50699833,
    "object_type": "order"
  },
  "metadata": {
    "new": {
      "id": 267312
    },
    "old": {
      "id": 393648
    },
    "order": {
      "id": 50699833,
      "name": "AB0300"
    }
  },
  "employee": {
    "id": 200206,
    "full_name": "John Doe",
    "email": "j.doe@corp.com"
  }
}
```

### Fields

* `id` — unique webhook id
* `created_at` — date of request in ISO 8601 format
* `created_at_ts` — date of request as a timestamp
* `event_name` — event name
* `context` — the context, where the event occurred
* `metadata` — useful event information
* `employee` — who was the initiator of event

## Securing Your Webhooks

To ensure the integrity and authenticity of webhook payloads, each request includes an `X-Signature` header. This header contains a SHA-256 hash generated using the webhook id and your secret key. You can use this signature to verify that the webhook payload is from our system and has not been tampered with.

## Error Handling and Retries

If your endpoint does not respond with a `2XX` status code, we will retry the webhook delivery as follows:

* 1st Retry: After 5 seconds.
* 2nd Retry: After 10 seconds.
* 3rd Retry: After 15 seconds.

If we fail to receive a 200 OK response after multiple retries over the course of 1 hour, the webhook will be disabled automatically. This ensures that non-functional endpoints do not impact the system's performance.

To re-enable the webhook, you will need to troubleshoot the issue and manually reactivate it via the Webhooks settings page.

Each account can create a maximum of 5 webhooks. This limit ensures optimal performance and prevents excessive resource usage.
