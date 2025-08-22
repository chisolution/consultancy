<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Contact Inquiry: {{ $contactInquiry->reference }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('admin.contact-inquiries.show', $contactInquiry) }}" 
                   class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Cancel
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.contact-inquiries.update', $contactInquiry) }}">
                        @csrf
                        @method('PATCH')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Status -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="status" id="status" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="new" {{ $contactInquiry->status === 'new' ? 'selected' : '' }}>New</option>
                                    <option value="in_progress" {{ $contactInquiry->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="responded" {{ $contactInquiry->status === 'responded' ? 'selected' : '' }}>Responded</option>
                                    <option value="closed" {{ $contactInquiry->status === 'closed' ? 'selected' : '' }}>Closed</option>
                                </select>
                            </div>

                            <!-- Priority -->
                            <div>
                                <label for="priority" class="block text-sm font-medium text-gray-700">Priority</label>
                                <select name="priority" id="priority" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="low" {{ $contactInquiry->priority === 'low' ? 'selected' : '' }}>Low</option>
                                    <option value="medium" {{ $contactInquiry->priority === 'medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="high" {{ $contactInquiry->priority === 'high' ? 'selected' : '' }}>High</option>
                                    <option value="urgent" {{ $contactInquiry->priority === 'urgent' ? 'selected' : '' }}>Urgent</option>
                                </select>
                            </div>
                        </div>

                        <!-- Notes -->
                        <div class="mt-6">
                            <label for="notes" class="block text-sm font-medium text-gray-700">Internal Notes</label>
                            <textarea name="notes" id="notes" rows="4" 
                                      placeholder="Add internal notes about this inquiry..."
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('notes', $contactInquiry->notes) }}</textarea>
                            <p class="mt-2 text-sm text-gray-500">These notes are for internal use only and will not be visible to the customer.</p>
                        </div>

                        <!-- Contact Information (Read-only) -->
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Contact Information (Read-only)</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-50 p-4 rounded-lg">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Name</label>
                                    <div class="mt-1 text-sm text-gray-900">{{ $contactInquiry->name }}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Email</label>
                                    <div class="mt-1 text-sm text-gray-900">{{ $contactInquiry->email }}</div>
                                </div>
                                @if($contactInquiry->phone)
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Phone</label>
                                        <div class="mt-1 text-sm text-gray-900">{{ $contactInquiry->phone }}</div>
                                    </div>
                                @endif
                                @if($contactInquiry->company)
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Company</label>
                                        <div class="mt-1 text-sm text-gray-900">{{ $contactInquiry->company }}</div>
                                    </div>
                                @endif
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700">Reference</label>
                                    <div class="mt-1 text-sm font-mono text-gray-900">{{ $contactInquiry->reference }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Message (Read-only) -->
                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-700">Original Message (Read-only)</label>
                            <div class="mt-1 p-4 bg-gray-50 rounded-lg">
                                <p class="text-sm text-gray-700 whitespace-pre-wrap">{{ $contactInquiry->message }}</p>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-8 flex justify-end space-x-3">
                            <a href="{{ route('admin.contact-inquiries.show', $contactInquiry) }}" 
                               class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                Cancel
                            </a>
                            <button type="submit" 
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update Inquiry
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Activity Log (Future Enhancement) -->
            <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Activity Log</h3>
                    <div class="text-sm text-gray-500">
                        <div class="flex items-center space-x-2 mb-2">
                            <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                            <span>Inquiry created on {{ $contactInquiry->created_at->format('M j, Y \a\t H:i') }}</span>
                        </div>
                        @if($contactInquiry->updated_at != $contactInquiry->created_at)
                            <div class="flex items-center space-x-2 mb-2">
                                <div class="w-2 h-2 bg-blue-400 rounded-full"></div>
                                <span>Last updated on {{ $contactInquiry->updated_at->format('M j, Y \a\t H:i') }}</span>
                            </div>
                        @endif
                        @if($contactInquiry->responded_at)
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-purple-400 rounded-full"></div>
                                <span>Responded on {{ $contactInquiry->responded_at->format('M j, Y \a\t H:i') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
