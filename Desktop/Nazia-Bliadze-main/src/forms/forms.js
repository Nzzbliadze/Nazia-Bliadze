export const contactFormProcessor = {
  process(name, email, subject, message) {
    console.log(`[Form Submit] Contact: ${name} (${email}), Subject: ${subject}`);
    return {
      name,
      email,
      subject,
      message,
      timestamp: new Date().toISOString()
    };
  }
};
