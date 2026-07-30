document.addEventListener('DOMContentLoaded', () => {

  // Stamp date in masthead
  const stampDate = document.getElementById('stamp-date');
  if (stampDate) {
    stampDate.textContent = new Date().toLocaleDateString('en-US', {
      year: 'numeric', month: 'short', day: '2-digit'
    });
  }

  const form = document.getElementById('apply-form');
  const submitBtn = document.getElementById('submit-btn');
  const statusEl = document.getElementById('form-status');

  const railItems = Array.from(document.querySelectorAll('#rail-list li'));
  const sections = Array.from(document.querySelectorAll('.block'));

  // ---- Rail progress tracking (scroll-based) ----
  const setActive = (id) => {
    railItems.forEach(li => {
      li.classList.toggle('active', li.dataset.section === id);
    });
  };

  const markDone = () => {
    sections.forEach(sec => {
      const li = railItems.find(l => l.dataset.section === sec.id);
      if (!li) return;
      const complete = isSectionComplete(sec);
      li.classList.toggle('done', complete);
    });
  };

  const isSectionComplete = (sec) => {
    const fields = sec.querySelectorAll('input[required], select[required], textarea[required]');
    for (const f of fields) {
      if (f.type === 'checkbox' && !f.checked) return false;
      if (f.type === 'file' && f.files.length === 0) return false;
      if (f.type !== 'checkbox' && f.type !== 'file' && !f.value.trim()) return false;
    }
    return fields.length > 0;
  };

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) setActive(entry.target.id);
      });
    }, { rootMargin: '-40% 0px -50% 0px', threshold: 0 });
    sections.forEach(sec => observer.observe(sec));
  }

  form.addEventListener('input', markDone);
  form.addEventListener('change', markDone);

  // ---- Cover letter counter ----
  const coverLetter = document.getElementById('coverLetter');
  const clCount = document.getElementById('cl-count');
  if (coverLetter && clCount) {
    coverLetter.addEventListener('input', () => {
      clCount.textContent = coverLetter.value.length;
    });
  }

  // ---- File drop ----
  const fileDrop = document.getElementById('file-drop');
  const fileInput = document.getElementById('resume');
  const fileText = document.getElementById('file-drop-text');

  const updateFileText = () => {
    if (fileInput.files.length) {
      fileText.textContent = fileInput.files[0].name;
      fileDrop.classList.add('filled');
    } else {
      fileText.textContent = 'Drop file here or click to browse';
      fileDrop.classList.remove('filled');
    }
  };

  fileInput.addEventListener('change', updateFileText);

  ['dragenter', 'dragover'].forEach(evt => {
    fileDrop.addEventListener(evt, (e) => {
      e.preventDefault();
      fileDrop.classList.add('drag');
    });
  });
  ['dragleave', 'drop'].forEach(evt => {
    fileDrop.addEventListener(evt, (e) => {
      e.preventDefault();
      fileDrop.classList.remove('drag');
    });
  });
  fileDrop.addEventListener('drop', (e) => {
    const dt = e.dataTransfer;
    if (dt && dt.files.length) {
      fileInput.files = dt.files;
      updateFileText();
    }
  });

  // ---- Validation ----
  const validators = {
    fullName: (v) => v.trim().length >= 2 || 'Enter your full name.',
    email: (v) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v) || 'Enter a valid email address.',
    phone: (v) => v.replace(/[^0-9]/g, '').length >= 7 || 'Enter a valid phone number.',
    position: (v) => v !== '' || 'Select a role.',
    employment: (v) => v !== '' || 'Select an employment type.',
    experience: (v) => (v !== '' && Number(v) >= 0) || 'Enter your years of experience.',
    coverLetter: (v) => v.trim().length >= 20 || 'Tell us a bit more (min 20 characters).',
  };

  const showError = (name, message) => {
    const errEl = document.getElementById('err-' + name);
    const field = document.getElementById(name);
    if (errEl) errEl.textContent = message || '';
    if (field) {
      const wrapper = field.closest('.field');
      if (wrapper) wrapper.classList.toggle('has-error', !!message);
    }
  };

  const validateField = (name) => {
    const field = document.getElementById(name);
    if (!field) return true;
    const validator = validators[name];
    if (validator) {
      const result = validator(field.value);
      if (result !== true) { showError(name, result); return false; }
    }
    showError(name, '');
    return true;
  };

  const validateFile = () => {
    if (!fileInput.files.length) {
      showError('resume', 'Attach your résumé.');
      return false;
    }
    const file = fileInput.files[0];
    const okType = /\.(pdf|doc|docx)$/i.test(file.name);
    const okSize = file.size <= 5 * 1024 * 1024;
    if (!okType) { showError('resume', 'File must be PDF or DOCX.'); return false; }
    if (!okSize) { showError('resume', 'File must be under 5MB.'); return false; }
    showError('resume', '');
    return true;
  };

  const validateConsent = () => {
    const consent = document.getElementById('consent');
    const ok = consent.checked;
    document.getElementById('err-consent').textContent = ok ? '' : 'Please confirm before submitting.';
    return ok;
  };

  Object.keys(validators).forEach(name => {
    const field = document.getElementById(name);
    if (field) field.addEventListener('blur', () => validateField(name));
  });

  // ---- Submit ----
  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    let valid = true;
    Object.keys(validators).forEach(name => {
      if (!validateField(name)) valid = false;
    });
    if (!validateFile()) valid = false;
    if (!validateConsent()) valid = false;

    if (!valid) {
      statusEl.textContent = 'Please fix the highlighted fields.';
      statusEl.classList.add('is-error');
      const firstError = form.querySelector('.has-error, .error:not(:empty)');
      if (firstError) firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
      return;
    }

    statusEl.classList.remove('is-error');
    statusEl.textContent = 'Submitting…';
    submitBtn.disabled = true;

    try {
      const formData = new FormData(form);
      const response = await fetch('submit.php', {
        method: 'POST',
        body: formData
      });

      const contentType = response.headers.get('content-type') || '';
      const data = contentType.includes('application/json')
        ? await response.json()
        : { success: response.ok, message: await response.text() };

      if (response.ok && data.success) {
        statusEl.textContent = data.message || 'Application received. Thank you!';
        form.reset();
        updateFileText();
        markDone();
        railItems.forEach(li => li.classList.remove('active', 'done'));
        document.getElementById('cl-count').textContent = '0';
      } else {
        statusEl.classList.add('is-error');
        statusEl.textContent = data.message || 'Something went wrong. Please try again.';
      }
    } catch (err) {
      statusEl.classList.add('is-error');
      statusEl.textContent = 'Network error — please try again.';
    } finally {
      submitBtn.disabled = false;
    }
  });

});
