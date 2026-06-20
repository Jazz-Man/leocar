# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project: leocar (research concluded)

**Status:** Research concluded (2026-06-18). A decision was made; nothing is implemented in
this repo yet. This file records the goal, the decision, and what was evaluated.

**Goal:** Give the team one place to see (and reply to) client messages arriving on three
business numbers — **Telegram**, **WhatsApp**, **Viber**. "One Telegram channel" was the
friend's original hacky workaround, not a hard requirement.

## Decision (2026-06-18)

**Use the existing CRM (RO App, `web.roapp.io`) + the e-chat.tech integration** to bring the
three messengers into the CRM client card — one interface, ~**$600/year**.

Why: every standalone aggregator (HelpCrunch, SendPulse, respond.io…) routes WhatsApp through
its own paid BSP and reads Viber only via a bot, producing a costly "zoo of integrations"
stacked on top of the CRM bill. RO App + e-chat.tech bundles the three channels into the CRM
the team already pays for, at lower total cost.

- **e-chat.tech** connects Viber/Telegram/WhatsApp numbers and surfaces chats from the CRM
  client card. Legal entity registered in **Indonesia** (ECHAT TECH COMMUNICATION LLC) — not RU.
- This **brings RO App back into scope as the hub**; the earlier "RO App out of scope" framing
  is superseded.

## Constraints (still valid)

- **No Russian services.** Ukraine-based; RU vendors excluded on principle and due to
  payment/sanctions. Confirmed/likely RU → banned: Radist.Online, Chat2Desk, МТС Exolve.
  e-chat.tech verified non-RU (Indonesia).
- Region: Ukraine.

## What was evaluated (if revisited)

- **Channel feasibility:** Telegram Business — readable via the official *connected bot*
  (needs Premium); WhatsApp — Cloud API with *coexistence* (same number in app + API), ~$0 for
  inbound (1,000 free service conversations/mo, 24h reply window), paid per template (UA
  ~$0.025 utility / ~$0.10 marketing); Viber — only a bot or an official partner Business
  Messages account.
- **Aggregators considered (non-RU):** HelpCrunch (UA, $29/mo Pro + separate 360dialog ~$59/mo
  for WhatsApp), SendPulse (UA, free/$12/mo, *bundles* the WhatsApp BSP — best value),
  respond.io (intl, from $79/mo). All aggregate into *their own* inbox, not a Telegram channel.

## Existing files (legacy context)

- `web-hook.php`, `index.php`, `doc.md`, `logs/` — an older RO App webhook receiver that logs
  CRM events. Not used by the chosen solution; kept as historical context.

## No build tooling

No package manager, test suite, or build step. The chosen path (RO App + e-chat.tech) is
configuration in third-party SaaS, not code in this repo — unless a custom relay/webhook is
later needed.

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
