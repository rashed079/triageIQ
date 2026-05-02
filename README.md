# TriageIQ

**Clinician-Supervised AI Triage & Diagnostic Support — Laurentian University Research 2026**

[![Live Demo](https://img.shields.io/badge/Live%20Demo-GitHub%20Pages-1a3a5c?style=flat-square)](https://rashed079.github.io/triageiq/)
[![Python](https://img.shields.io/badge/Python-3.11-3776AB?style=flat-square&logo=python)](https://python.org)
[![FastAPI](https://img.shields.io/badge/FastAPI-0.104-009688?style=flat-square)](https://fastapi.tiangolo.com)
[![React](https://img.shields.io/badge/React-18-61DAFB?style=flat-square&logo=react)](https://react.dev)
[![Claude API](https://img.shields.io/badge/Claude-API-CC785C?style=flat-square)](https://anthropic.com)
[![License](https://img.shields.io/badge/License-GPL%20v2-blue?style=flat-square)](LICENSE)

> ⚠️ **Research demonstration only. Not for clinical use. All AI outputs require clinician verification.**

---

## Overview

TriageIQ combines structured **CTAS-aligned patient intake** with **evidence-grounded AI differential generation** — keeping the clinician fully in control of every triage and diagnostic decision.

Built as a full-stack Python/React application with Claude API integration, FAISS-powered RAG, and a complete FastAPI REST backend.

---

## The Problem

| Metric | Reality |
|---|---|
| Average Canadian ED wait time | 4.5 hours |
| Clinician time on documentation | ~40% |
| Unsupervised AI symptom checker accuracy | Low |
| Existing tools with full clinician oversight | 0 |

---

## How It Works

```
Patient → CTAS Intake Chatbot → Red-Flag Detection
                ↓
         Structured Extraction (Claude)
                ↓
         RAG Engine (FAISS + Clinical Guidelines)
                ↓
         Differential Generation (Claude + Citations)
                ↓
         Clinician Dashboard → Accept/Reject → Sign-Off
                ↓
              Audit Trail
```

---

## Key Features

- **CTAS-aligned intake** — Conversational symptom collection per Canadian Triage and Acuity Scale
- **Red-flag detection** — Immediate escalation for life-threatening presentations
- **Evidence-grounded AI** — RAG engine grounds differentials in clinical guidelines with citations
- **Full clinician oversight** — Accept/reject each differential, select CTAS level, sign off
- **Zero autonomous decisions** — AI assists; clinician decides
- **Complete audit trail** — Every turn, extraction, and decision logged per session
- **Local-first** — Designed to run without patient data leaving the clinical environment

---

## Tech Stack

| Layer | Technology |
|---|---|
| AI / LLM | Claude API (claude-sonnet-4), Anthropic Python SDK |
| Backend | Python 3.11, FastAPI, Uvicorn, Pydantic v2 |
| RAG | FAISS vector index, clinical guideline documents |
| Frontend | React 18, TypeScript, Tailwind CSS, Axios |
| Infrastructure | Docker, Docker Compose |
| Compliance path | AWS ca-central-1 (PHIPA), audit logging |

---

## Quick Start

### Prerequisites
- Python 3.10+
- Node.js 16+
- Anthropic API key ([console.anthropic.com](https://console.anthropic.com))

### Run with Docker (Recommended)
```bash
git clone https://github.com/rashed079/triageiq.git
cd triageiq
echo "ANTHROPIC_API_KEY=sk-ant-your-key-here" > .env
docker-compose up --build
```
Open http://localhost:3000

### Run Manually
```bash
# Backend
cd backend
python -m venv venv && source venv/bin/activate
pip install -r requirements.txt
cp .env.example .env  # Add your API key
uvicorn main:app --reload --port 8000

# Frontend (new terminal)
cd frontend
npm install && npm start
```

---

## API Endpoints

| Method | Endpoint | Description |
|---|---|---|
| GET | `/health` | Server health check |
| POST | `/api/sessions/start` | Start patient intake session |
| POST | `/api/sessions/turn` | Send patient message |
| POST | `/api/sessions/complete` | Extract data + generate differential |
| POST | `/api/sessions/signoff` | Clinician sign-off |
| GET | `/api/sessions/{id}/result` | Full session result |
| GET | `/api/sessions/{id}/audit` | Audit trail |
| GET | `/api/sessions` | List all sessions |

Interactive docs: **http://localhost:8000/docs**

---

## Project Structure

```
triageiq/
├── backend/
│   ├── main.py                    # FastAPI server + all endpoints
│   ├── config.py                  # .env settings loader
│   ├── requirements.txt
│   └── modules/
│       ├── intake/
│       │   ├── conversation.py    # CTAS chatbot + red-flag detection
│       │   └── extractor.py       # Transcript → structured fields (Claude)
│       └── rag/
│           ├── ingestion.py       # Clinical guidelines → FAISS index
│           └── engine.py          # RAG retrieval + differential generation
├── frontend/
│   └── src/
│       ├── App.tsx
│       ├── components/
│       │   ├── IntakeChatbot.tsx
│       │   └── ClinicianDashboard.tsx
│       └── api/triageiq.ts
├── github-pages/
│   └── index.html                 # Static GitHub Pages demo
└── docker-compose.yml
```

---

## Live Demo (GitHub Pages)

The `github-pages/index.html` is a fully self-contained interactive demo — no backend required.

Deploy to GitHub Pages: **Settings → Pages → main branch → `/github-pages` folder**

Live at: `https://rashed079.github.io/triageiq/`

---

## Roadmap

- [ ] Replace pseudo-embeddings with real OpenAI/Cohere embeddings
- [ ] PostgreSQL for persistent session storage
- [ ] Auth0 / AWS Cognito for clinician authentication + MFA
- [ ] AWS ca-central-1 deployment for PHIPA compliance
- [ ] Expanded clinical knowledge base (CTAS guidelines, PubMed)
- [ ] Health Canada pre-submission meeting

---

## Developer

**Md Rashed Azad Chowdhury** — PMP® · CBAP® · ITIL V3 · ISO 27001

- 📍 Greater Sudbury, ON, Canada
- 📧 rashed06cse@gmail.com
- 💼 [linkedin.com/in/rashed-azad-c](https://www.linkedin.com/in/md-rashed-azad-chowdhury-pmp%C2%AE-a145325a/)
- 🎓 MSc Computational Science — Laurentian University (SSML & CROSH Labs)

---

## Disclaimer

TriageIQ is a research demonstration build. It is **not approved for clinical use**. No real patient data should be entered. Health Canada pre-submission consultation required before any clinical pilot. All AI outputs require clinician verification.

---

*Laurentian University · Smart & Sustainable Mining Lab & CROSH · Sudbury, ON · 2026*
