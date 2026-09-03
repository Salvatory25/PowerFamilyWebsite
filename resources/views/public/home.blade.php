@extends('layouts.app')

@section('title', __('app.company_name') . ' — ' . __('app.tagline'))
@section('meta_description', 'Power Family Investment — ' . __('app.hero_subtitle'))

@section('content')
@php
    $waNum = preg_replace('/[^0-9]/', '', \App\Models\Setting::get('whatsapp_number', '255759423626'));
    $phone = \App\Models\Setting::get('company_phone', '+255 759 423 626');
    // We use a high quality premium image for the hero
    $heroImg = asset('images/hero-premium.jpg');
@endphp

<style>
/* ═══ PREMIUM TOKENS ══════════════════════════════════════════════════ */
:root{
  --c-maroon:#750D15; --c-maroon-dk:#1C0305; --c-maroon-lt:#961620;
  --c-gold:#D48B16;   --c-gold-lt:#FAC955;   --c-gold-pale:#FEF9EC;
  --c-navy:#0E1726;   --c-white:#FFFFFF;
  --c-bg:#FAFAFA;     --c-gray:#6B7280;
  --c-gray-lt:#E5E7EB; --c-border:#E2E8F0;
  --c-text:#0F172A;   --c-text-mid:#475569;
  --ff-head:'Outfit',system-ui,sans-serif;
  --ff-body:'Inter',system-ui,sans-serif;
  --shadow-sm:0 4px 6px rgba(0,0,0,0.02);
  --shadow-md:0 10px 30px rgba(0,0,0,0.06);
  --shadow-lg:0 24px 48px rgba(0,0,0,0.08);
  --r-sm:12px; --r-md:16px; --r-lg:24px; --r-xl:32px; --r-pill:100px;
}

/* ═══ TYPOGRAPHY ═══════════════════════════════════════════════════ */
.prm-label{
  font-family:var(--ff-body);font-size:12px;font-weight:800;letter-spacing:0.25em;
  text-transform:uppercase;color:var(--c-gold);margin-bottom:16px;display:inline-block;
}
.prm-label::before{content:'';display:inline-block;width:32px;height:2px;background:var(--c-gold);margin-right:12px;vertical-align:middle;}
.prm-h2{
  font-family:var(--ff-head);font-size:clamp(36px,5vw,56px);font-weight:900;
  color:var(--c-navy);line-height:1.1;letter-spacing:-0.02em;margin-bottom:24px;
}
.prm-h2 em{font-style:normal;color:var(--c-maroon);}
.prm-h2--white{color:var(--c-white);}
.prm-h2--white em{color:var(--c-gold-lt);}
.prm-p{font-family:var(--ff-body);font-size:16px;color:var(--c-gray);line-height:1.8;max-width:600px;}

/* ═══ BUTTONS ══════════════════════════════════════════════════════ */
.btn-prm{
  display:inline-flex;align-items:center;gap:12px;
  background:var(--c-maroon);color:var(--c-white);
  font-family:var(--ff-body);font-size:14px;font-weight:800;letter-spacing:0.05em;text-transform:uppercase;
  padding:18px 40px;border-radius:var(--r-pill);transition:all 0.4s cubic-bezier(0.16,1,0.3,1);
  box-shadow:0 8px 24px rgba(117,13,21,0.2);position:relative;overflow:hidden;
}
.btn-prm:hover{transform:translateY(-4px);box-shadow:0 16px 32px rgba(117,13,21,0.3);background:var(--c-maroon-dk);}
.btn-prm svg{transition:transform 0.4s;width:18px;height:18px;color:var(--c-gold-lt);}
.btn-prm:hover svg{transform:translateX(6px);}

.btn-sec{
  display:inline-flex;align-items:center;gap:12px;
  background:rgba(255,255,255,0.1);backdrop-filter:blur(12px); border:1px solid rgba(255,255,255,0.2);
  color:var(--c-white);font-family:var(--ff-body);font-size:14px;font-weight:800;letter-spacing:0.05em;text-transform:uppercase;
  padding:18px 40px;border-radius:var(--r-pill);transition:all 0.4s;
}
.btn-sec:hover{background:rgba(255,255,255,0.2);border-color:rgba(255,255,255,0.5);transform:translateY(-2px);}

.btn-link{
  display:inline-flex;align-items:center;gap:8px;font-family:var(--ff-body);font-size:14px;font-weight:800;
  letter-spacing:0.05em;text-transform:uppercase;color:var(--c-maroon);transition:all 0.3s;
}
.btn-link:hover{gap:16px;color:var(--c-navy);}

/* ═══ 1. CINEMATIC HERO ════════════════════════════════════════════ */
.hero-prm{
  position:relative;width:100%;height:100vh;min-height:700px;
  display:flex;align-items:center;justify-content:center;
  background-color:var(--c-navy);overflow:hidden;
  /* Shift hero under the absolute floating header */
  margin-top: -120px;
}
.hero-prm__bg{
  position:absolute;inset:0;width:100%;height:100%;object-fit:cover;
  transform:scale(1.05);animation:heroZoom 20s infinite alternate linear;
}
@keyframes heroZoom { 0%{transform:scale(1);} 100%{transform:scale(1.1);} }
.hero-prm__overlay{
  position:absolute;inset:0;
  background:linear-gradient(to bottom, rgba(14,23,38,0.7) 0%, rgba(14,23,38,0.4) 40%, rgba(14,23,38,0.9) 100%);
}
.hero-prm__content{
  position:relative;z-index:10;max-width:1000px;width:100%;padding:0 5vw;
  text-align:center;display:flex;flex-direction:column;align-items:center;
  /* Push content down to avoid the floating header */
  margin-top: 100px;
}
.hero-prm__title{
  font-family:var(--ff-head);font-size:clamp(48px, 6vw, 88px);
  font-weight:900;line-height:1.05;letter-spacing:-0.03em;color:var(--c-white);
  margin-bottom:24px;text-shadow:0 10px 30px rgba(0,0,0,0.5);
}
.hero-prm__sub{
  font-family:var(--ff-body);font-size:clamp(16px, 2vw, 20px);
  line-height:1.8;color:rgba(255,255,255,0.85);max-width:700px;margin:0 auto 48px;
}
.hero-prm__actions{display:flex;flex-wrap:wrap;gap:20px;justify-content:center;}

/* ═══ 2. SEARCH & TRUST ════════════════════════════════════════════ */
.search-bar-wrap{
  position:relative;z-index:20;margin-top:-60px;padding:0 5vw;
}
.search-bar{
  max-width:1200px;margin:0 auto;background:var(--c-white);
  border-radius:var(--r-xl);box-shadow:var(--shadow-lg);padding:32px;
  display:grid;grid-template-columns:1fr 1fr 1fr 1fr auto;gap:24px;align-items:end;
}
@media(max-width:1024px){.search-bar{grid-template-columns:1fr 1fr;}}
@media(max-width:640px){.search-bar{grid-template-columns:1fr;}}

.search-field label{
  display:block;font-family:var(--ff-body);font-size:11px;font-weight:800;
  letter-spacing:0.1em;text-transform:uppercase;color:var(--c-gray);margin-bottom:12px;
}
.search-field select, .search-field input{
  width:100%;background:var(--c-bg);border:1px solid var(--c-border);
  border-radius:var(--r-sm);padding:16px 20px;font-family:var(--ff-body);
  font-size:15px;font-weight:600;color:var(--c-navy);outline:none;
  transition:border-color 0.3s;appearance:none;
}
.search-field select:focus, .search-field input:focus{border-color:var(--c-gold);}
.btn-search{
  height:54px;display:inline-flex;align-items:center;justify-content:center;gap:12px;
  background:var(--c-gold);color:var(--c-white);font-family:var(--ff-body);
  font-size:14px;font-weight:800;letter-spacing:0.05em;text-transform:uppercase;
  padding:0 40px;border-radius:var(--r-sm);border:none;cursor:pointer;
  box-shadow:0 8px 24px rgba(212,139,22,0.3);transition:all 0.3s;
}
.btn-search:hover{background:var(--c-navy);box-shadow:0 12px 30px rgba(14,23,38,0.2);}

/* Trust Strip */
.trust-strip{
  background:var(--c-white);padding:64px 5vw;
  border-bottom:1px solid var(--c-border);
}
.trust-grid{
  max-width:1280px;margin:0 auto;display:grid;grid-template-columns:repeat(4,1fr);gap:40px;
}
@media(max-width:1024px){.trust-grid{grid-template-columns:repeat(2,1fr);gap:40px;}}
@media(max-width:640px){.trust-grid{grid-template-columns:1fr;gap:32px;}}
.trust-item{display:flex;align-items:flex-start;gap:20px;}
.trust-icon{
  width:56px;height:56px;border-radius:16px;background:var(--c-gold-pale);
  display:flex;align-items:center;justify-content:center;flex-shrink:0;
}
.trust-icon svg{width:28px;height:28px;color:var(--c-gold);}
.trust-text h3{font-family:var(--ff-head);font-size:18px;font-weight:800;color:var(--c-navy);margin-bottom:8px;}
.trust-text p{font-family:var(--ff-body);font-size:14px;color:var(--c-gray);line-height:1.6;}

/* ═══ 3. EDITORIAL CATEGORIES ══════════════════════════════════════ */
.categories-sec{padding:120px 5vw;background:var(--c-bg);}
.cat-hdr{max-width:1280px;margin:0 auto 64px;text-align:center;}
.cat-grid{
  max-width:1280px;margin:0 auto;
  display:grid;grid-template-columns:repeat(4,1fr);gap:24px;
}
@media(max-width:1024px){.cat-grid{grid-template-columns:repeat(2,1fr);gap:24px;}}
@media(max-width:640px){.cat-grid{grid-template-columns:1fr;}}
.cat-card{
  position:relative;border-radius:var(--r-xl);overflow:hidden;
  aspect-ratio:3/4;display:flex;align-items:flex-end;padding:32px 24px;
  background:#000;
}
.cat-card img{
  position:absolute;inset:0;width:100%;height:100%;object-fit:cover;
  opacity:0.6;transition:transform 0.8s, opacity 0.8s;
}
.cat-card:hover img{transform:scale(1.1);opacity:0.4;}
.cat-card::before{
  content:'';position:absolute;inset:0;
  background:linear-gradient(to top, rgba(14,23,38,0.95) 0%, transparent 60%);z-index:1;
}
.cat-card__content{position:relative;z-index:2;width:100%;}
.cat-card__title{font-family:var(--ff-head);font-size:24px;font-weight:800;color:var(--c-white);margin-bottom:8px;line-height:1.2;}
.cat-card__desc{font-family:var(--ff-body);font-size:14px;color:rgba(255,255,255,0.7);margin-bottom:24px;line-height:1.6;}
.cat-card__link{
  display:inline-flex;align-items:center;gap:8px;font-family:var(--ff-body);
  font-size:12px;font-weight:800;letter-spacing:0.1em;text-transform:uppercase;color:var(--c-gold-lt);
}
.cat-card__link svg{transition:transform 0.3s;}
.cat-card:hover .cat-card__link svg{transform:translateX(6px);}

/* ═══ 4. FEATURED PROPERTIES ══════════════════════════════════════ */
.featured-sec{padding:120px 5vw;background:var(--c-white);}
.feat-hdr{max-width:1280px;margin:0 auto 64px;display:flex;justify-content:space-between;align-items:flex-end;}
@media(max-width:768px){.feat-hdr{flex-direction:column;align-items:flex-start;gap:24px;}}
.prop-grid{max-width:1280px;margin:0 auto;display:grid;grid-template-columns:repeat(3,1fr);gap:32px;}
@media(max-width:1024px){.prop-grid{grid-template-columns:repeat(2,1fr);}}
@media(max-width:768px){.prop-grid{grid-template-columns:1fr;}}

.prop-card{
  background:var(--c-white);border-radius:var(--r-xl);overflow:hidden;
  border:1px solid var(--c-border);box-shadow:var(--shadow-sm);
  transition:all 0.4s cubic-bezier(0.16,1,0.3,1);display:flex;flex-direction:column;
}
.prop-card:hover{transform:translateY(-12px);box-shadow:var(--shadow-lg);border-color:rgba(117,13,21,0.1);}
.prop-card__img{position:relative;aspect-ratio:4/3;overflow:hidden;}
.prop-card__img img{width:100%;height:100%;object-fit:cover;transition:transform 0.8s;}
.prop-card:hover .prop-card__img img{transform:scale(1.08);}
.prop-card__tag{
  position:absolute;top:20px;left:20px;background:rgba(255,255,255,0.9);backdrop-filter:blur(4px);
  padding:8px 16px;border-radius:var(--r-pill);font-family:var(--ff-body);font-size:11px;
  font-weight:800;letter-spacing:0.1em;text-transform:uppercase;color:var(--c-navy);
}
.prop-card__body{padding:32px;}
.prop-card__price{font-family:var(--ff-head);font-size:24px;font-weight:900;color:var(--c-maroon);margin-bottom:12px;}
.prop-card__title{font-family:var(--ff-head);font-size:20px;font-weight:800;color:var(--c-navy);margin-bottom:12px;line-height:1.3;}
.prop-card__loc{display:flex;align-items:center;gap:8px;font-family:var(--ff-body);font-size:14px;color:var(--c-gray);margin-bottom:24px;}
.prop-card__loc svg{color:var(--c-gold);width:18px;height:18px;}
.prop-card__meta{
  display:flex;gap:20px;padding-top:20px;border-top:1px solid var(--c-border);
}
.meta-item{display:flex;align-items:center;gap:8px;font-family:var(--ff-body);font-size:13px;font-weight:600;color:var(--c-text-mid);}
.meta-item svg{color:var(--c-gold);width:16px;height:16px;}

/* ═══ 5. INVESTMENT SECTION ═══════════════════════════════════════ */
.invest-sec{
  padding:120px 5vw;background:var(--c-navy);position:relative;overflow:hidden;
}
.invest-sec::before{
  content:'';position:absolute;top:0;right:0;width:800px;height:100%;
  background:radial-gradient(ellipse at right, rgba(117,13,21,0.4) 0%, transparent 70%);pointer-events:none;
}
.invest-grid{
  max-width:1280px;margin:0 auto;display:grid;grid-template-columns:1fr 1fr;gap:80px;align-items:center;position:relative;z-index:2;
}
@media(max-width:1024px){.invest-grid{grid-template-columns:1fr;gap:64px;}}
.invest-vals{display:grid;grid-template-columns:1fr 1fr;gap:32px;}
@media(max-width:640px){.invest-vals{grid-template-columns:1fr;}}
.val-item{
  background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.05);
  padding:32px;border-radius:var(--r-xl);transition:all 0.4s;
}
.val-item:hover{background:rgba(255,255,255,0.08);border-color:rgba(250,201,85,0.3);transform:translateY(-8px);}
.val-icon{
  width:48px;height:48px;border-radius:12px;background:rgba(250,201,85,0.1);
  display:flex;align-items:center;justify-content:center;margin-bottom:24px;
}
.val-icon svg{width:24px;height:24px;color:var(--c-gold-lt);}
.val-title{font-family:var(--ff-head);font-size:18px;font-weight:800;color:var(--c-white);margin-bottom:12px;}
.val-desc{font-family:var(--ff-body);font-size:14px;color:rgba(255,255,255,0.6);line-height:1.7;}

/* ═══ 6. ABOUT SECTION ════════════════════════════════════════════ */
.about-sec{padding:120px 5vw;background:var(--c-bg);}
.about-grid{
  max-width:1280px;margin:0 auto;display:grid;grid-template-columns:1.2fr 1fr;gap:80px;align-items:center;
}
@media(max-width:1024px){.about-grid{grid-template-columns:1fr;gap:56px;}}
.about-img{position:relative;border-radius:var(--r-xl);overflow:hidden;}
.about-img img{width:100%;height:auto;border-radius:var(--r-xl);}
.about-img::after{
  content:'';position:absolute;inset:0;border:1px solid rgba(255,255,255,0.2);border-radius:var(--r-xl);
}
.about-stats{
  position:absolute;bottom:-30px;right:40px;background:var(--c-white);
  padding:32px 48px;border-radius:var(--r-xl);box-shadow:var(--shadow-lg);
  display:flex;align-items:center;gap:24px;
}
.stat-big{font-family:var(--ff-head);font-size:48px;font-weight:900;color:var(--c-maroon);line-height:1;}
.stat-lbl{font-family:var(--ff-body);font-size:13px;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:var(--c-gray);max-width:100px;}

/* ═══ 7. PREMIUM CTA ══════════════════════════════════════════════ */
.cta-sec{
  margin:0 5vw 120px;background:linear-gradient(135deg,var(--c-maroon-dk),var(--c-maroon));
  border-radius:var(--r-xl);padding:100px 48px;text-align:center;position:relative;overflow:hidden;
}
@media(max-width:768px){.cta-sec{padding:80px 24px;margin:0 24px 80px;}}
.cta-sec::before{
  content:'';position:absolute;inset:0;
  background:url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M20 20.5V18H0v-2h20v-2.5L25 17l-5 3.5zM40 18v2H20v-2h20z' fill='%23FFFFFF' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
}
.cta-content{position:relative;z-index:2;max-width:800px;margin:0 auto;}
.cta-actions{display:flex;flex-wrap:wrap;justify-content:center;gap:20px;margin-top:48px;}

/* ═══ GALLERY SCROLL ═════════════════════════════════════════════ */
.gallery-sec{padding:0 0 120px 0;background:var(--c-bg);}
.hz-gallery-scroll{
  display:flex;gap:24px;overflow-x:auto;padding:0 5vw 32px;scroll-snap-type:x mandatory;
  -webkit-overflow-scrolling:touch;scrollbar-width:none;
}
.hz-gallery-scroll::-webkit-scrollbar{display:none;}
.hz-gallery-item{
  flex-shrink:0;width:400px;height:300px;border-radius:var(--r-xl);overflow:hidden;
  scroll-snap-align:start;position:relative;
}
@media(max-width:768px){.hz-gallery-item{width:300px;height:240px;}}
.hz-gallery-item img{width:100%;height:100%;object-fit:cover;transition:transform 0.8s;}
.hz-gallery-item:hover img{transform:scale(1.08);}
</style>

{{-- ═══════════════════════════════════════════════════════════
     1. CINEMATIC HERO
═══════════════════════════════════════════════════════════ --}}
<section class="hero-prm">
    <!-- Make sure hero image actually exists or use the default -->
    <img src="{{ $heroImg }}" onerror="this.src='{{ asset('images/hero-split.jpg') }}'" alt="Premium Property" class="hero-prm__bg">
    <div class="hero-prm__overlay"></div>
    
    <div class="hero-prm__content">
        <span class="prm-label" style="color:var(--c-gold-lt)">{{ __('app.hero_badge') }}</span>
        <h1 class="hero-prm__title">
            {!! str_replace(['Sahihi', 'Smarter'], ['<em>Sahihi</em>', '<em>Smarter</em>'], __('app.hero_title')) !!}
        </h1>
        <p class="hero-prm__sub">
            {{ __('app.hero_subtitle') }}
        </p>
        <div class="hero-prm__actions">
            <a href="{{ route('plots.index') }}" class="btn-prm">
                {{ __('app.hero_cta_plots') }}
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="https://wa.me/{{ $waNum }}" target="_blank" class="btn-sec">
                {{ __('app.hero_cta_contact') }}
            </a>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════
     2. SEARCH BAR & TRUST STRIP
═══════════════════════════════════════════════════════════ --}}
<div class="search-bar-wrap">
    <form action="{{ route('plots.index') }}" method="GET" class="search-bar">
        <div class="search-field">
            <label>{{ __('app.search_looking_for') }}</label>
            <select name="type">
                <option value="">{{ __('app.search_all_types') }}</option>
                <option value="residential">{{ __('app.search_residential') }}</option>
                <option value="commercial">{{ __('app.search_commercial') }}</option>
            </select>
        </div>
        <div class="search-field">
            <label>{{ __('app.search_location') }}</label>
            <select name="location">
                <option value="">{{ __('app.search_all_locations') }}</option>
                @foreach(\App\Models\Location::orderBy('area_name')->get() as $loc)
                    <option value="{{ $loc->id }}">{{ $loc->display_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="search-field">
            <label>{{ __('app.search_budget') }} (MIN)</label>
            <input type="number" name="min_price" placeholder="Mfano: 5,000,000">
        </div>
        <div class="search-field">
            <label>{{ __('app.search_budget') }} (MAX)</label>
            <input type="number" name="max_price" placeholder="Mfano: 50,000,000">
        </div>
        <button type="submit" class="btn-search">
            {{ __('app.search_btn') }}
        </button>
    </form>
</div>

<section class="trust-strip">
    <div class="trust-grid">
        <div class="trust-item">
            <div class="trust-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg></div>
            <div class="trust-text">
                <h3>{{ __('app.why_trust_title') }}</h3>
                <p>{{ __('app.why_trust_desc') }}</p>
            </div>
        </div>
        <div class="trust-item">
            <div class="trust-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg></div>
            <div class="trust-text">
                <h3>{{ __('app.why_variety_title') }}</h3>
                <p>{{ __('app.why_variety_desc') }}</p>
            </div>
        </div>
        <div class="trust-item">
            <div class="trust-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg></div>
            <div class="trust-text">
                <h3>{{ __('app.why_support_title') }}</h3>
                <p>{{ __('app.why_support_desc') }}</p>
            </div>
        </div>
        <div class="trust-item">
            <div class="trust-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div>
            <div class="trust-text">
                <h3>{{ __('app.why_confidence_title') }}</h3>
                <p>{{ __('app.why_confidence_desc') }}</p>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════
     3. EDITORIAL CATEGORIES
═══════════════════════════════════════════════════════════ --}}
<section class="categories-sec">
    <div class="cat-hdr">
        <span class="prm-label">{{ __('app.categories_title') }}</span>
        <h2 class="prm-h2">{{ __('app.categories_subtitle') }}</h2>
    </div>
    
    <div class="cat-grid">
        <!-- Res Plots -->
        <div class="cat-card">
            <img src="{{ asset('images/category-res.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800&q=80'" alt="Residential Plots">
            <div class="cat-card__content">
                <h3 class="cat-card__title">{{ __('app.cat_plots_res_title') }}</h3>
                <p class="cat-card__desc">{{ __('app.cat_plots_res_desc') }}</p>
                <a href="{{ route('plots.index', ['category' => 'residential']) }}" class="cat-card__link">
                    {{ __('app.cat_plots_res_cta') }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
        <!-- Com Plots -->
        <div class="cat-card">
            <img src="{{ asset('images/category-com.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&q=80'" alt="Commercial Plots">
            <div class="cat-card__content">
                <h3 class="cat-card__title">{{ __('app.cat_plots_com_title') }}</h3>
                <p class="cat-card__desc">{{ __('app.cat_plots_com_desc') }}</p>
                <a href="{{ route('plots.index', ['category' => 'commercial']) }}" class="cat-card__link">
                    {{ __('app.cat_plots_com_cta') }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
        <!-- Houses -->
        <div class="cat-card">
            <img src="{{ asset('images/category-house.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=800&q=80'" alt="Houses">
            <div class="cat-card__content">
                <h3 class="cat-card__title">{{ __('app.cat_houses_title') }}</h3>
                <p class="cat-card__desc">{{ __('app.cat_houses_desc') }}</p>
                <a href="{{ route('houses.index') }}" class="cat-card__link">
                    {{ __('app.cat_houses_cta') }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
        <!-- Vehicles -->
        <div class="cat-card">
            <img src="{{ asset('images/category-car.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1549399542-7e3f8b79c341?w=800&q=80'" alt="Vehicles">
            <div class="cat-card__content">
                <h3 class="cat-card__title">{{ __('app.cat_vehicles_title') }}</h3>
                <p class="cat-card__desc">{{ __('app.cat_vehicles_desc') }}</p>
                <a href="{{ route('vehicles.index') }}" class="cat-card__link">
                    {{ __('app.cat_vehicles_cta') }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════
     4. FEATURED PROPERTIES
═══════════════════════════════════════════════════════════ --}}
@php
    $featuredPlots = \App\Models\Plot::where('is_featured', true)->with('location')->take(3)->get();
@endphp
@if($featuredPlots->count() > 0)
<section class="featured-sec">
    <div class="feat-hdr">
        <div>
            <span class="prm-label">{{ __('app.featured_title') }}</span>
            <h2 class="prm-h2">{{ __('app.featured_subtitle') }}</h2>
        </div>
        <a href="{{ route('plots.index') }}" class="btn-link">
            {{ __('app.view_all_plots') }}
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>

    <div class="prop-grid">
        @foreach($featuredPlots as $plot)
        <a href="{{ route('plots.show', $plot->slug) }}" class="prop-card">
            <div class="prop-card__img">
                <img src="{{ $plot->featured_image_url }}" alt="{{ $plot->title }}">
                <div class="prop-card__tag">{{ $plot->category == 'residential' ? __('app.search_residential') : __('app.search_commercial') }}</div>
            </div>
            <div class="prop-card__body">
                <div class="prop-card__price">TZS {{ number_format($plot->price) }}</div>
                <h3 class="prop-card__title">{{ $plot->title }}</h3>
                <div class="prop-card__loc">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    {{ $plot->location ? $plot->location->display_name : 'Tanzania' }}
                </div>
                <div class="prop-card__meta">
                    <div class="meta-item">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>
                        {{ $plot->size }} SQM
                    </div>
                    <div class="meta-item">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        {{ $plot->status == 'available' ? __('app.status_available') : __('app.status_sold') }}
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</section>
@endif

{{-- ═══════════════════════════════════════════════════════════
     5. INVESTMENT VALUES SECTION
═══════════════════════════════════════════════════════════ --}}
<section class="invest-sec">
    <div class="invest-grid">
        <div class="invest-text">
            <span class="prm-label" style="color:var(--c-gold-lt)">Power Family Investment</span>
            <h2 class="prm-h2 prm-h2--white">
                {!! str_replace(['Uhakika', 'Certainty'], ['<em>Uhakika</em>', '<em>Certainty</em>'], __('app.why_title')) !!}
            </h2>
            <p class="prm-p" style="color:rgba(255,255,255,0.7)">
                {{ __('app.why_subtitle') }}
            </p>
        </div>
        <div class="invest-vals">
            <div class="val-item">
                <div class="val-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg></div>
                <h4 class="val-title">{{ __('app.why_trust_title') }}</h4>
                <p class="val-desc">{{ __('app.why_trust_desc') }}</p>
            </div>
            <div class="val-item">
                <div class="val-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg></div>
                <h4 class="val-title">{{ __('app.why_variety_title') }}</h4>
                <p class="val-desc">{{ __('app.why_variety_desc') }}</p>
            </div>
            <div class="val-item">
                <div class="val-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg></div>
                <h4 class="val-title">{{ __('app.why_support_title') }}</h4>
                <p class="val-desc">{{ __('app.why_support_desc') }}</p>
            </div>
            <div class="val-item">
                <div class="val-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg></div>
                <h4 class="val-title">{{ __('app.why_confidence_title') }}</h4>
                <p class="val-desc">{{ __('app.why_confidence_desc') }}</p>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════
     6. ABOUT SUMMARY & GALLERY
═══════════════════════════════════════════════════════════ --}}
<section class="about-sec">
    <div class="about-grid">
        <div class="about-img">
            <img src="{{ asset('images/about-premium.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=1000&q=80'" alt="About Power Family Investment">
        </div>
        <div class="about-text">
            <span class="prm-label">Kuhusu Sisi</span>
            <h2 class="prm-h2">Mshirika Wako Kwenye <em>Ukuaji wa Mitaji</em>.</h2>
            <p class="prm-p">
                Power Family Investment imejikita katika kuwapa Watanzania na wawekezaji fursa bora za kumiliki ardhi, nyumba za kisasa, na magari ya uhakika. Tunafanya mchakato wa ununuzi kuwa rahisi, salama na wenye uwazi.
            </p>
            <br>
            <a href="{{ route('pages.about') }}" class="btn-link">
                {{ app()->getLocale() === 'sw' ? 'Soma Zaidi Kuhusu Sisi' : 'Read More About Us' }}
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

@php
    $galleryItems = \App\Models\GalleryItem::latest()->take(6)->get();
@endphp
@if($galleryItems->count() > 0)
<section class="gallery-sec">
    <div class="hz-gallery-scroll">
        @foreach($galleryItems as $item)
        <div class="hz-gallery-item">
            <img src="{{ $item->url }}" alt="{{ $item->title }}">
            <div class="hz-gallery-overlay">
                <span class="hz-gallery-caption">{{ $item->title }}</span>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif

{{-- ═══════════════════════════════════════════════════════════
     7. PREMIUM CTA
═══════════════════════════════════════════════════════════ --}}
<section class="cta-sec">
    <div class="cta-content">
        <h2 class="prm-h2 prm-h2--white">{!! str_replace(['Tayari', 'Ready'], ['<em>Tayari</em>', '<em>Ready</em>'], __('app.cta_title')) !!}</h2>
        <p class="prm-p" style="margin:0 auto; color:rgba(255,255,255,0.8);">{{ __('app.cta_subtitle') }}</p>
        <div class="cta-actions">
            <a href="https://wa.me/{{ $waNum }}" target="_blank" class="btn-prm" style="background:var(--c-gold);color:var(--c-navy);">
                {{ __('app.cta_whatsapp') }}
            </a>
            <a href="{{ route('plots.index') }}" class="btn-sec">
                {{ __('app.cta_call') }}
            </a>
        </div>
    </div>
</section>

@endsection
