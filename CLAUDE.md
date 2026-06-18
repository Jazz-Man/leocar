# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project: leocar (research / MVP phase)

**Status:** Research only. No production feature is built yet.

**Goal:** Collect incoming client messages from three sources — **Telegram Business**,
**WhatsApp Business**, and **Viber Business** numbers — and aggregate them into **one
Telegram channel**. The user is helping a friend who runs the business behind "leocar".

## Scope

**In scope:** Aggregating inbound messages from the 3 messenger business numbers into a
single Telegram channel (read visibility is the stated need; whether replies are needed is TBD).

**Out of scope:** Anything related to **RO App** (`web.roapp.io`) and webhooks. The existing
RO App files in this repo are exploratory leftovers from an earlier spike and are **not** part
of this project or the MVP. Do not extend them or build on them unless the user explicitly
returns to that.

## Constraints (settled)

- **No Russian services.** Business is Ukraine-based; RU vendors are excluded on principle
  and due to payment/sanctions problems. Confirmed/likely RU → banned: **Radist.Online**,
  **Chat2Desk**, **МТС Exolve/exolve.ru**; verify jurisdiction for Pact.im, WAMM.chat, Umnico
  before recommending. Prefer **Ukrainian** (HelpCrunch, SendPulse) or **international**
  (respond.io, Trengo, Sleekflow, Chatwoot) vendors.
- **Approach:** aggregator SaaS (chosen over self-built). Region: Ukraine.
- **Channel feasibility (verified):** Telegram Business number — readable via the official
  *connected bot* (needs Premium/Business); WhatsApp — Cloud API with *coexistence* (same
  number in app + API); Viber — official partner account only (Messente/Sinch/Messaggio…),
  approval + cost — the hardest channel in any approach.
- **Key tension:** aggregators put messages in **their own shared inbox**, not a literal
  Telegram channel. Whether "TG channel" is a hard requirement or just the friend's current
  hacky workaround is **pending the user's talk with the friend** — this decides Approach A
  (shared inbox) vs B (aggregator + relay → TG channel).

## Existing files (out of scope — context only)

- `web-hook.php`, `index.php`, `doc.md`, `logs/` — an RO App webhook receiver that logs CRM
  events (Lead/Client/Comment...). Ignore for the messenger-aggregation work. No code for the
  actual goal exists yet.

## No build tooling

There is no package manager, test suite, or build step relevant to the current goal. If a
solution is built here it will start from scratch; don't assume the existing PHP setup is the
foundation.

## Open questions (resolve before choosing a solution)

1. **One-way or two-way?** Read-only aggregation into a TG channel, or must the team also reply
   from there back to the client?
2. **Accounts:** Do the 3 business numbers already exist and are they set up for API/bot access?
3. **Build vs. buy:** Open to a third-party omnichannel aggregator (fastest MVP) or must it be
   self-built? Note that the official WhatsApp/Viber/Telegram-Business APIs and aggregators
   generally cost money and require approval — cost tolerance matters.
4. **Volume / region:** Expected message volume and country/region (affects which aggregators
   are available, e.g. CIS-market tools vs. global ones).

---

## Workflow Rules

**Use `brainstorming` skill before any creative or feature work. Use `writing-plans` skill for multi-step tasks.**

**Use `verification-before-completion` before claiming any work is done. Run the command, read the output, verify.**

**Use `systematic-debugging` skill for any bug or test failure — investigate root cause before attempting fixes.**

## Think Before Coding

**Don't assume. Don't hide confusion. Surface tradeoffs.**

- State assumptions explicitly. If uncertain, ask.
- If multiple interpretations exist, present them — don't pick silently.
- If a simpler approach exists, say so. Push back when warranted.
- If the data format or API response is unclear, stop and ask.


## Simplicity First

**Minimum code that solves the problem. Nothing speculative.**

- No features beyond what was asked.
- No abstractions for single-use code.
- No error handling for impossible scenarios.
- Three similar lines is better than a premature abstraction.


## Surgical Changes

**Touch only what you must. Clean up only your own mess.**

- Don't "improve" adjacent code, comments, or formatting.
- Don't refactor things that aren't broken.
- Match existing style, even if you'd do it differently.
- If you notice unrelated dead code, mention it — don't delete it.

The test: Every changed line should trace directly to the user's request.


## Skills

Use these skills when the situation matches:


- `brainstorming` — before new features, creative work, or architectural decisions
- `writing-plans` — before multi-step implementation tasks
- `verification-before-completion` — before claiming work is complete
- `systematic-debugging` — for bugs, test failures, unexpected behavior
- `requesting-code-review` — after completing tasks, major features, or before merge
- `dispatching-parallel-agents` — when facing 2+ independent tasks with no shared state

## When Stuck

**Investigate, don't work around.** Use `systematic-debugging` skill for any failure.
