"use client";

import React, { useEffect, useState } from 'react';
import { useForm } from 'react-hook-form';
import { zodResolver } from '@hookform/resolvers/zod';
import { z } from 'zod';
import { Button } from "@/components/ui/button";
import { Card, CardHeader, CardTitle, CardDescription, CardContent, CardFooter } from "@/components/ui/card";
import { Form, FormField, FormItem, FormLabel, FormControl, FormMessage } from "@/components/ui/form";
import { Input } from "@/components/ui/input";
import { useRouter } from "next/navigation";

const otpSchema = z.object({
  otp: z.string().regex(/^[0-9]{6}$/, "Invalid OTP format"),
});

type OTPFormData = z.infer<typeof otpSchema>;

export default function OTPVerification() {
  const [email, setEmail] = useState<string | null>(null);
  const form = useForm<OTPFormData>({
    resolver: zodResolver(otpSchema),
    defaultValues: {
      otp: '',
    },
  });

  useEffect(() => {
    const storedEmail = localStorage.getItem('userEmail');
    if (storedEmail) {
      setEmail(storedEmail);
    } else {
      // Handle case where email is not found in localStorage
      alert('No email found. Please register first.');
    }
  }, []);
  const router = useRouter(); 
  const onSubmit = async (values: OTPFormData) => {
    if (!email) {
      alert('Email not available.');
      return;
    }

    try {
      const response = await fetch('http://localhost:7099/api/v1/auth/verify-otp', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ email, otp: values.otp }),
      });
      const data = await response.json();
      if (!response.ok) {
        throw new Error(data.message || 'Something went wrong');
      }
      alert('OTP Verified Successfully!');
      router.push('/dashboard'); 

    } catch (error: any) {
      alert(error.message || 'Something went wrong');
    }
  };

  return (
    <div className="flex justify-center items-center h-screen bg-gray-100">
      <Card className="w-full max-w-md shadow-md p-4">
        <CardHeader>
          <CardTitle className="text-center text-2xl text-primary">Verify OTP</CardTitle>
          <CardDescription className="text-center text-md text-slate-600">
            Please enter the OTP sent to your email address
          </CardDescription>
        </CardHeader>
        <Form {...form}>
          <form onSubmit={form.handleSubmit(onSubmit)}>
            <CardContent className="space-y-4">
              <FormField
                control={form.control}
                name="otp"
                render={({ field }) => (
                  <FormItem>
                    <FormLabel>OTP</FormLabel>
                    <FormControl>
                      <Input {...field} placeholder="Enter OTP" className="py-2" />
                    </FormControl>
                    <FormMessage />
                  </FormItem>
                )}
              />
            </CardContent>
            <CardFooter className="flex justify-end">
              <Button
                type="submit"
                children="Verify OTP"
              />
            </CardFooter>
          </form>
        </Form>
      </Card>
    </div>
  );
}
