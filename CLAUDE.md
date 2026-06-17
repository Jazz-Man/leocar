# CLAUDE.md

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
- `writing-plans` — for multi-step implementation tasks
- `verification-before-completion` — before claiming work is complete
- `systematic-debugging` — for bugs, test failures, unexpected behavior
- `requesting-code-review` — after completing tasks, major features, or before merge
- `dispatching-parallel-agents` — when facing 2+ independent tasks with no shared state

## When Stuck

**Investigate, don't work around.** Use `systematic-debugging` skill for any failure.
